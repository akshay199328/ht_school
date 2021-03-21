<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPF_Ninja_Forms extends NF_Abstracts_Action {

	/**
	 * @var string
	 */
	public $slug = 'ninja-forms';

	/**
	 * @var string
	 */
	protected $_name = 'wpfusion';

	/**
	 * @var array
	 */
	protected $_tags = array();

	/**
	 * @var string
	 */
	protected $_timing = 'late';

	/**
	 * @var int
	 */
	protected $_priority = 10;


	/**
	 * Gets things started
	 *
	 * @access  public
	 * @since   1.0
	 * @return  void
	 */

	public function __construct() {

		wp_fusion()->integrations->{'ninja-forms'} = $this;

		parent::__construct();

		$this->_nicename = 'WP Fusion';

		$settings = $this->get_settings();

		$this->_settings = array_merge( $this->_settings, $settings );

		add_action( 'ninja_forms_builder_templates', array( $this, 'row_template' ) );

	}

	/**
	 * Add admin action settings
	 *
	 * @access public
	 * @return array Settings
	 */

	public function row_template() {

		?>
		<script id="tmpl-nf-wpf-field-map-row" type="text/template">

		<div>
			<span class="dashicons dashicons-menu handle"></span>
		</div>
		<div>
			<label class="has-merge-tags">
				<input type="text" class="setting" value="{{{ data.form_field }}}" data-id="form_field">
				<span class="dashicons dashicons-list-view merge-tags"></span>
			</label>
			<span class="nf-option-error"></span>
		</div>
		<div>
			<label>
				<select data-id="field_map" list="field_map" class="setting">
				{{{ data.renderOptions( 'field_map', data.field_map )}}}
				</select>
			</label>
			<span class="nf-option-error"></span>
		</div>
		<div>
			<span class="dashicons dashicons-dismiss nf-delete"></span>
		</div>
		</script>


		<?php

	}


	/**
	 * Add admin action settings
	 *
	 * @access public
	 * @return array Settings
	 */

	public function get_settings() {

		$fields = array(
			array(
				'label' => __( 'Select a field', 'wp-fusion' ),
				'value' => false,
			),
		);

		foreach ( wp_fusion()->settings->get_crm_fields_flat() as $key => $label ) {

			$fields[] = array(
				'label' => $label,
				'value' => $key,
			);

		}

		$settings = array();

		$settings['apply_tags'] = array(
			'name'        => 'apply_tags',
			'type'        => 'textbox',
			'group'       => 'primary',
			'label'       => __( 'Apply Tags', 'wp-fusion' ),
			'width'       => 'full',
			'placeholder' => __( 'Comma-separated list of tag names or IDs', 'wp-fusion' ),
		);

		$settings['wpf_field_map'] = array(
			'name'     => 'wpf_field_map',
			'type'     => 'option-repeater',
			'label'    => sprintf( __( '%s Field Mapping', 'wp-fusion' ), wp_fusion()->crm->name ) . ' <a href="#" class="nf-add-new">' .
							__( 'Add New', 'wp-fusion' ) . '</a>',
			'width'    => 'full',
			'group'    => 'primary',
			'tmpl_row' => 'tmpl-nf-wpf-field-map-row',
			'value'    => array(),
			'columns'  => array(
				'form_field' => array(
					'header'  => __( 'Form Field', 'wp-fusion' ),
					'default' => '',
				),
				'field_map'  => array(
					'header'  => sprintf( __( '%s Field', 'wp-fusion' ), wp_fusion()->crm->name ),
					'options' => $fields,
					'default' => '',
					// 'field_types' => array(
					// 'textbox',
					// ),
				),
			),
		);

		$settings['wpfmessage_old'] = array(
			'name'           => 'wpfmessage_old',
			'type'           => 'html',
			'group'          => 'advanced',
			'value'          => sprintf( __( 'These settings are from an earlier version of WP Fusion ( < v3.35.9 ) and will be removed in a future update.', 'wp-fusion' ), wp_fusion()->crm->name ),
			'width'          => 'full',
			'use_merge_tags' => true,
		);

		foreach ( wp_fusion()->settings->get_crm_fields_flat() as $key => $label ) {

			$settings[ 'field_' . $key ] = array(
				'name'           => 'field_' . $key,
				'type'           => 'textbox',
				'group'          => 'advanced',
				'label'          => $label,
				'placeholder'    => '',
				'value'          => '',
				'width'          => 'full',
				'use_merge_tags' => true,
			);

		}

		if ( class_exists( 'NF_ConditionalLogic' ) ) {
			$settings = array_merge( $settings, NF_ConditionalLogic::config( 'ActionSettings' ) );
		}

		return $settings;

	}

	/**
	 * Save
	 *
	 * @access  public
	 * @return  void
	 */

	public function save( $action_settings ) {

	}

	/**
	 * Process form sumbission
	 *
	 * @access  public
	 * @return  void
	 */

	public function process( $action_settings, $form_id, $data ) {

		$email_address = false;
		$update_data   = array();

		foreach ( $data['fields'] as $field ) {

			if ( false == $email_address && 'email' == $field['settings']['type'] && is_email( $field['value'] ) ) {
				$email_address = $field['value'];
				break;
			}
		}

		// Old (pre 3.35.9) settings

		foreach ( $action_settings as $key => $setting ) {

			if ( strpos( $key, 'field_' ) !== 0 || ( empty( $setting ) && null !== $setting ) ) {
				continue;
			}

			$field_key = str_replace( 'field_', '', $key );

			$update_data[ $field_key ] = $setting;

		}

		// New fields map

		if ( isset( $action_settings['wpf_field_map'] ) ) {

			foreach ( $action_settings['wpf_field_map'] as $id => $setting ) {

				$value = $setting['form_field'];

				// Get the type

				$type = 'text';

				foreach ( $data['fields'] as $field ) {

					// Convert checkboxes to bool

					if ( 'checkbox' == $field['type'] ) {

						if ( $value == $field['checked_value'] ) {
							$value = true;
							$type  = 'checkbox';
							break;
						} elseif ( $value == $field['unchecked_value'] ) {
							$value = null;
							$type  = 'checkbox';
							break;
						}
					}

					// Implode arrays so they match in the next step

					if ( is_array( $field['value'] ) ) {
						$field['value'] = implode( ',', $field['value'] );
					}

					if ( $field['value'] == $value ) {

						if ( 'listmultiselect' == $field['type'] || 'listcheckbox' == $field['type'] ) {
							$type = 'multiselect';
						} else {
							$type = $field['type'];
						}

						break;

					}
				}

				if ( ! empty( $value ) || null === $value ) {

					$update_data[ $setting['field_map'] ] = apply_filters( 'wpf_format_field_value', $value, $type, $setting['field_map'] );

				}
			}
		}

		$apply_tags = array();

		if ( ! empty( $action_settings['apply_tags'] ) ) {

			$tags_exploded = explode( ',', $action_settings['apply_tags'] );

			foreach ( $tags_exploded as $tag ) {

				$tag_id = wp_fusion()->user->get_tag_id( $tag );

				if ( false === $tag_id ) {

					wpf_log( 'notice', $user_id, 'Unable to determine tag ID from tag with name <strong>' . $tag . '</strong>. Tag will not be applied.' );
					continue;

				}

				$apply_tags[] = $tag_id;
			}
		}

		$args = array(
			'email_address'    => $email_address,
			'update_data'      => $update_data,
			'apply_tags'       => $apply_tags,
			'integration_slug' => 'ninja_forms',
			'integration_name' => 'Ninja Forms',
			'form_id'          => $form_id,
			'form_title'       => $data['settings']['title'],
			'form_edit_link'   => admin_url( 'admin.php?page=ninja-forms&form_id=' . $form_id ),
		);

		require_once WPF_DIR_PATH . 'includes/integrations/class-forms-helper.php';

		$contact_id = WPF_Forms_Helper::process_form_data( $args );

	}

}

Ninja_Forms()->actions['wpfusion'] = new WPF_Ninja_Forms();

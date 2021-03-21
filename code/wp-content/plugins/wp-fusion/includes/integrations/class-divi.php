<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPF_Divi extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @since 3.17.2
	 */

	public function init() {

		$this->slug = 'divi';

		add_filter( 'et_builder_get_parent_modules', array( $this, 'add_field' ) );

		add_filter( 'et_pb_module_shortcode_attributes', array( $this, 'shortcode_attributes' ), 10 );

	}

	/**
	 * Register the settings on all Divi modules.
	 *
	 * @since  3.36.5
	 *
	 * @link https://gist.github.com/awah95/2d471f049eb3b7024003109d550eebb2
	 *
	 * @param  array $modules The registered modules.
	 * @return array $modules The registered modules.
	 */
	public function add_field( $modules ) {

		// Ensure we run this code only once because it's expensive.

		static $is_applied = false;

		if ( $is_applied ) {
			return $modules;
		}

		// Bail early if the modules list empty.

		if ( empty( $modules ) ) {
			return $modules;
		}

		foreach ( $modules as $module_slug => $module ) {

			// Ensure fields list exist.

			if ( ! isset( $module->fields_unprocessed ) ) {
				continue;
			}

			/**
			 * Fields list on the module.
			 *
			 * @var array
			 *
			 * The structures:
			 * array(
			 *     'field_slug' => array(
			 *         'label'       => '',
			 *         'description' => '',
			 *         'type'        => '',
			 *         'toggle_slug' => '',
			 *         'tab_slug'    => '',
			 *     ),
			 *     ... Other fields.
			 * )
			 */

			$fields_list = $module->fields_unprocessed;

			if ( ! empty( $fields_list ) ) {

				$fields_list['wpf_tag'] = array(
					'label'       => sprintf( __( 'Required %s tags (any)', 'wp-fusion' ), wp_fusion()->crm->name ),
					'type'        => 'text',
					'tab_slug'    => 'custom_css',
					'toggle_slug' => 'visibility',
					'description' => __( 'Enter a comma-separated list of tag names or IDs that are required to view this element.', 'wp-fusion' ),
				);

				$modules[ $module_slug ]->fields_unprocessed = $fields_list;
			}
		}

		$is_applied = true;

		return $modules;

	}


	/**
	 * Shortcode attributes
	 *
	 * @return  array Shortcode atts
	 */

	public function shortcode_attributes( $props ) {

		if ( ! empty( $props['wpf_tag'] ) ) {

			$can_access = true;

			if ( wp_fusion()->settings->get( 'exclude_admins' ) == true && current_user_can( 'manage_options' ) ) {

				$can_access = true;

			} else {

				if ( ! wpf_is_user_logged_in() ) {

					$can_access = false;

				} else {

					$setting_tags_string = explode( ',', $props['wpf_tag'] );
					$setting_tags        = array();

					foreach ( $setting_tags_string as $tag ) {
						$setting_tags[] = wp_fusion()->user->get_tag_id( $tag );
					}

					$user_tags = wp_fusion()->user->get_tags();

					if ( empty( array_intersect( $user_tags, $setting_tags ) ) ) {
						$can_access = false;
					}
				}
			}

			$can_access = apply_filters( 'wpf_user_can_access', $can_access, wpf_get_current_user_id(), false );

			$can_access = apply_filters( 'wpf_divi_can_access', $can_access, $props );

			if ( false === $can_access ) {
				$props['disabled'] = 'on';
			}
		}

		return $props;

	}

}

new WPF_Divi;

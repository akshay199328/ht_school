<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class WPF_BuddyPress extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @access  public
	 * @return  void
	 */

	public function init() {

		if ( function_exists( 'bp_rest_namespace' ) && 'buddyboss' == bp_rest_namespace() ) {
			$this->slug = 'buddyboss';
		} else {
			$this->slug = 'buddypress';
		}

		add_filter( 'wpf_redirect_post_id', array( $this, 'get_bb_page_id' ) );
		add_filter( 'wpf_meta_field_groups', array( $this, 'add_meta_field_group' ), 15 );
		add_filter( 'wpf_meta_fields', array( $this, 'prepare_meta_fields' ), 30 );

		// Loading XProfile data
		add_filter( 'wpf_set_user_meta', array( $this, 'set_user_meta' ), 10, 2 );

		add_filter( 'wpf_meta_box_post_types', array( $this, 'unset_wpf_meta_boxes' ) );

		add_filter( 'wpf_user_register', array( $this, 'user_register' ), 10, 2 );
		add_filter( 'wpf_user_update', array( $this, 'user_update' ), 10, 2 );
		add_filter( 'wpf_get_user_meta', array( $this, 'get_user_meta' ), 10, 2 );

		// Auto login
		add_action( 'wpf_started_auto_login', array( $this, 'started_auto_login' ), 10, 2 );

		// Settings
		add_filter( 'wpf_configure_settings', array( $this, 'register_settings' ), 15, 2 );

		// Defer until activation
		add_action( 'bp_signup_validate', array( $this, 'before_user_registration' ) );
		add_action( 'bp_core_activated_user', array( $this, 'after_user_activation' ), 20, 3 ); // 20 so all the normal BP stuff has run

		// Profile updates
		add_action( 'profile_update', array( $this, 'sync_email_address_changes' ), 10, 2 );
		add_action( 'xprofile_avatar_uploaded', array( $this, 'sync_avatars' ), 10, 3 );

		// Profile completion
		add_filter( 'xprofile_pc_user_progress_formatted', array( $this, 'apply_profile_complete_tags' ) );

		// Profile tabs (via BuddyPress User Profile Tabs Creator Pro)
		add_action( 'add_meta_boxes_bpptc_profile_tab', array( $this, 'add_meta_box_profile_tabs' ) );
		add_filter( 'bp_core_create_nav_link', array( $this, 'filter_profile_tabs' ) );

		// Group tag linking
		add_action( 'bp_groups_admin_meta_boxes', array( $this, 'add_meta_box_groups' ) );
		add_action( 'bp_group_admin_edit_after', array( $this, 'save_groups_data' ), 20 );
		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 9, 2 ); // This is 9 so that the user is in the correct groups by the time LearnDash (maybe) runs to update their courses

		// Group joins and leaves
		add_action( 'groups_join_group', array( $this, 'join_group' ), 10, 2 );
		add_action( 'groups_accept_invite', array( $this, 'groups_accept_invite' ), 10, 2 );
		add_action( 'groups_membership_accepted', array( $this, 'groups_accept_invite' ), 10, 2 );
		add_action( 'groups_leave_group', array( $this, 'leave_group' ), 10, 2 );
		add_action( 'groups_remove_member', array( $this, 'leave_group' ), 10, 2 );

		// Group visibility
		add_filter( 'wpf_restrict_content_post_type_object_label', array( $this, 'groups_meta_box_object_label' ), 10, 2 );
		add_filter( 'wpf_settings_for_meta_box', array( $this, 'groups_meta_box_settings' ), 10, 2 );
		add_filter( 'wpf_post_access_meta', array( $this, 'groups_access_meta' ) );
		add_action( 'wpf_filtering_page_content', array( $this, 'filter_group_content' ) );

		// Group types

		if ( function_exists( 'bp_groups_get_group_type_post_type' ) ) {

			add_action( 'add_meta_boxes_' . bp_groups_get_group_type_post_type(), array( $this, 'add_meta_box_group_types' ) );
			add_action( 'save_post', array( $this, 'save_group_type_meta_box_data' ) );

		}

		// BuddyBoss access control
		add_filter( 'bb_get_access_control_lists', array( $this, 'get_access_control_lists' ) );

		// Username changer
		add_action( 'bp_username_changed', array( $this, 'username_changed' ), 10, 3 );

		// Profile type tag linking
		add_action( 'add_meta_boxes', array( $this, 'add_profile_type_meta_box' ), 10, 2 );
		add_action( 'save_post', array( $this, 'save_profile_type_meta_box_data' ), 10 );
		add_action( 'wpf_tags_modified', array( $this, 'update_profile_types' ), 10, 2 );
		add_action( 'bp_set_member_type', array( $this, 'set_member_type' ), 10, 3 );
		add_action( 'bp_remove_member_type', array( $this, 'remove_member_type' ), 10, 2 );

		// Filter activity stream for restricted items
		add_filter( 'bp_activity_get', array( $this, 'filter_activity_stream' ), 10, 2 );

		// LearnDash group sync compatibility
		add_action( 'groups_member_after_save', array( $this, 'groups_member_after_save' ) );
		add_action( 'ld_removed_group_access', array( $this, 'removing_group_access' ), 5, 2 ); // 5 so it runs before removed_group_access in WPF_LearnDash

		// Meta fields
		add_filter( 'wpf_user_meta_shortcode_value', array( $this, 'user_meta_shortcode_value' ), 10, 2 );

		// Export functions
		add_filter( 'wpf_export_options', array( $this, 'export_options' ) );
		add_action( 'wpf_batch_buddypress_groups_init', array( $this, 'batch_init' ) );
		add_action( 'wpf_batch_buddypress_groups', array( $this, 'batch_step_groups' ) );

		add_action( 'wpf_batch_buddyboss_profile_types_init', array( $this, 'batch_init' ) );
		add_action( 'wpf_batch_buddyboss_profile_types', array( $this, 'batch_step_profile_types' ) );

	}

	/**
	 * Gets page ID for BBP core pages
	 *
	 * @access  public
	 * @return  int Post ID
	 */

	public function get_bb_page_id( $post_id ) {

		if ( $post_id != 0 ) {
			return $post_id;
		}

		global $bp;
		$post = get_page_by_path( $bp->unfiltered_uri[0] );

		if ( ! empty( $post ) ) {
			return $post->ID;
		}

		return $post_id;

	}

	/**
	 * Adds Buddypress field group to meta fields list
	 *
	 * @access  public
	 * @return  array Field groups
	 */

	public function add_meta_field_group( $field_groups ) {

		if( !isset( $field_groups['buddypress'] ) ) {
			$field_groups['buddypress'] = array( 'title' => 'BuddyPress', 'fields' => array() );
		}

		return $field_groups;

	}

	/**
	 * Loads XProfile fields for inclusion in Contact Fields table
	 *
	 * @access  public
	 * @return  array Meta Fields
	 */

	public function prepare_meta_fields( $meta_fields ) {

		$meta_fields['bbp_profile_type'] = array(
			'label' => 'Profile Type',
			'type'  => 'text',
			'group' => 'buddypress',
		);

		if ( ! class_exists( 'BP_XProfile_Data_Template' ) ) {
			return $meta_fields;
		}

		$groups = bp_xprofile_get_groups( array(
			'fetch_fields' => true,
		) );

		$meta_fields['bbp_avatar'] = array(
			'label' => 'Avatar URL',
			'type'  => 'text',
			'group' => 'buddypress',
		);

		foreach ( $groups as $group ) {

			if ( ! empty( $group->fields ) ) {

				foreach ( $group->fields as $field ) {

					if( $field->type == 'checkbox' ) {
						$type = 'multiselect';
					} elseif( $field->type == 'multiselect_custom_taxonomy' ) {
						$type = 'multiselect';
					} elseif( $field->type == 'multiselectbox' ) {
						$type = 'multiselect';
					} elseif( $field->type == 'datebox' ) {
						$type = 'date';
					} else {
						$type = 'text';
					}

					$meta_fields[ 'bbp_field_' . $field->id ] = array( 'label' => $field->name, 'type' => $type, 'group' => 'buddypress' );

				}

			}

		}

		return $meta_fields;

	}

	/**
	 * Triggered before registration, allows removing WPF create_user hook
	 *
	 * @access public
	 * @return void
	 */

	public function before_user_registration() {

		if ( wp_fusion()->settings->get( 'bp_defer' ) == true ) {
			remove_action( 'user_register', array( wp_fusion()->user, 'user_register' ), 20 );
		}

	}

	/**
	 * Triggered after activation, syncs the new user to the CRM
	 *
	 * @access public
	 * @return void
	 */

	public function after_user_activation( $user_id, $key, $user ) {

		if ( wp_fusion()->settings->get( 'bp_defer' ) == true ) {

			wp_fusion()->user->user_register( $user_id, $user['meta'] );

		}

	}


	/**
	 * Triggered when new user registered through BBP
	 *
	 * @access  public
	 * @return  array Post Data
	 */

	public function user_register( $post_data, $user_id ) {

		$field_map = array(
			'signup_username' => 'user_login',
			'signup_password' => 'user_pass',
			'signup_email'    => 'user_email',
		);

		$post_data = $this->map_meta_fields( $post_data, $field_map );

		// Xprofile fields
		foreach ( $post_data as $field_id => $value ) {

			if ( strpos( $field_id, 'field_' ) !== false && ! empty( $value ) ) {
				$post_data[ 'bbp_' . $field_id ] = $value;
			}

		}

		return $post_data;

	}

	/**
	 * Filters updates to profile form
	 *
	 * @access  public
	 * @return  array Post Data
	 */

	public function user_update( $post_data, $user_id ) {

		$field_map = array(
			'pass1'      => 'user_pass',
			'email'      => 'user_email',
			'first-name' => 'first_name',
			'last-name'  => 'last_name',
		);

		$post_data = $this->map_meta_fields( $post_data, $field_map );

		// Clean up XProfile fields

		foreach ( $post_data as $field_id => $value ) {

			if ( strpos( $field_id, 'field_' ) === 0 ) {

				if ( is_array( $value ) ) {
					$post_data[ 'bbp_' . $field_id ] = array_map( 'wp_strip_all_tags', $value );
				} else {
					$post_data[ 'bbp_' . $field_id ] = wp_strip_all_tags( $value, true );
				}
			}
		}

		// buddypress()->profile->table_name_groups — If this function is run too early the table name isn't defined and an SQL warning is thrown

		if ( ! class_exists( 'BP_XProfile_Data_Template' ) || ! isset( buddypress()->profile->table_name_groups ) ) {
			return $post_data;
		}

		$r = array(
			'user_id'          => wpf_get_current_user_id(),
			'member_type'      => 'any',
			'fetch_fields'     => true,
			'fetch_field_data' => true,
		);

		$profile_template = new BP_XProfile_Data_Template( $r );

		foreach ( $profile_template->groups as $group ) {

			if ( ! empty( $group->fields ) ) {

				foreach ( $group->fields as $field ) {

					if( $field->type == 'multiselect_custom_taxonomy' && isset( $post_data['bbp_field_' . $field->id] ) ) {

						if( is_array( $post_data['bbp_field_' . $field->id] ) ) {

							foreach( $post_data['bbp_field_' . $field->id] as $i => $term_id ) {

								if( ! is_numeric( $term_id ) ) {
									continue;
								}

								$term = get_term( $term_id );

								if( $term == null ) {
									continue;
								}

								$post_data['bbp_field_' . $field->id][] = $term->name;

								unset( $post_data['bbp_field_' . $field->id][$i] );

							}

							$post_data['bbp_field_' . $field->id] = array_values( $post_data['bbp_field_' . $field->id] );

						} elseif ( is_numeric( $post_data['bbp_field_' . $field->id] ) ) {

							$term = get_term( $term_id );

							if( $term != null ) {
								$post_data['bbp_field_' . $field->id] = $term->name;
							}

						}

					} elseif ( 'gender' == $field->type && isset( $post_data[ "bbp_field_{$field->id}" ] ) ) {

						$parts = explode( '_', $post_data[ "bbp_field_{$field->id}" ] );

						// Remove the her_ / his_ prefix

						$post_data[ "bbp_field_{$field->id}" ] = $parts[1];

					}
				}
			}
		}

		return $post_data;

	}

	/**
	 * Gets XProfile fields from the database when exporting metadata
	 *
	 * @access  public
	 * @return  array User Meta
	 */

	public function get_user_meta( $user_meta, $user_id ) {

		if ( ! class_exists( 'BP_XProfile_ProfileData' ) ) {
			return $user_meta;
		}

		$user_data = BP_XProfile_ProfileData::get_all_for_user( $user_id );

		foreach ( $user_data as $field ) {

			if ( is_array( $field ) && isset( $field['field_id'] ) ) {

				$data = maybe_unserialize( $field['field_data'] );

				// Clean up special characters

				if ( is_array( $data ) ) {
					$data = array_map( 'htmlspecialchars_decode', $data );
				} else {
					$data = htmlspecialchars_decode( $data );
				}

				$user_meta[ 'bbp_field_' . $field['field_id'] ] = $data;

			}
		}

		// Get the avatar

		$avatar_url = bp_core_fetch_avatar(
			array(
				'object'  => 'user',
				'item_id' => $user_id,
				'html'    => false,
				'type'    => 'full',
			)
		);

		if ( $avatar_url ) {
			$user_meta['bbp_avatar'] = $avatar_url;
		}

		return $user_meta;

	}

	/**
	 * Set some BP cache stuff so that auto-login doesn't throw errors
	 *
	 * @access  public
	 * @return  void
	 */

	public function started_auto_login( $user_id, $contact_id ) {

		wp_cache_set( $user_id, array(), 'bp_member_member_type' );

	}


	/**
	 * Triggered when email changed
	 *
	 * @access  public
	 * @return  void
	 */

	public function sync_email_address_changes( $user_id, $old_user_data ) {

		$user = get_user_by( 'id', $user_id );

		if ( $user->user_email !== $old_user_data->user_email ) {
			wp_fusion()->user->push_user_meta( $user_id, array( 'user_email' => $user->user_email ) );
		}

	}

	/**
	 * Sync avatars when they've been uploaded
	 *
	 * @access  public
	 * @since   3.35.7
	 * @return  void
	 */

	public function sync_avatars( $user_id, $avatar_type, $avatar_data ) {

		$avatar_url = bp_core_fetch_avatar(
			array(
				'object'  => $avatar_data['object'],
				'item_id' => $avatar_data['item_id'],
				'html'    => false,
				'type'    => 'full',
			)
		);

		wp_fusion()->user->push_user_meta( $user_id, array( 'bbp_avatar' => $avatar_url ) );

	}

	/**
	 * Apply profile complete tags
	 *
	 * @access  public
	 * @return  array Progress Details
	 */

	public function apply_profile_complete_tags( $progress_details ) {

		if ( 100 == $progress_details['completion_percentage'] ) {

			$apply_tags = wp_fusion()->settings->get( 'bp_apply_tags_profile_complete' );

			if ( ! empty( $apply_tags ) ) {

				wp_fusion()->user->apply_tags( $apply_tags );

			}
		}

		return $progress_details;

	}

	/**
	 * Triggered when user meta is loaded from the CRM or when a user is imported
	 *
	 * @access  public
	 * @return  array User Mtea
	 */

	public function set_user_meta( $user_meta, $user_id ) {

		if ( ! class_exists( 'BP_XProfile_ProfileData' ) ) {
			return $user_meta;
		}

		foreach ( $user_meta as $key => $value ) {

			if ( strpos( $key, 'bbp_field_' ) !== false ) {

				$field_id = str_replace( 'bbp_field_', '', $key );

				$field        = new BP_XProfile_ProfileData( $field_id, $user_id );
				$field->value = $value;
				$field->save();

				unset( $user_meta[ $key ] );

			}
		}

		return $user_meta;

	}

	/**
	 * Removes standard WPF meta boxes from BP related post types
	 *
	 * @access  public
	 * @return  array Post Types
	 */

	public function unset_wpf_meta_boxes( $post_types ) {

		unset( $post_types['bp-member-type'] );
		unset( $post_types['bp-group-type'] );

		return $post_types;

	}

	/**
	 * Adds meta boxes to the profile tab editor
	 *
	 * @since  3.36.7
	 */

	public function add_meta_box_profile_tabs() {

		add_meta_box( 'wpf-meta', __( 'WP Fusion - Profile Tab', 'wp-fusion' ), array( $this, 'meta_box_callback_profile_tabs' ), 'bpptc_profile_tab', 'side', 'core' );

	}

	/**
	 * If profile tab is disabled, hide it
	 *
	 * @since  3.36.7
	 *
	 * @param  array       $nav_item The navigation item.
	 * @return array|false The navigation item, or false if access is denied.
	 */

	public function filter_profile_tabs( $nav_item ) {

		if ( ! function_exists( 'bpptc_get_post_type' ) ) {
			return $nav_item;
		}

		$post = get_page_by_path( $nav_item['slug'], OBJECT, bpptc_get_post_type() );

		if ( is_object( $post ) && ! wp_fusion()->access->user_can_access( $post->ID ) ) {

			// If the user can't access, remove the item
			$nav_item = false;

		}

		return $nav_item;

	}

	/**
	 * Adds meta boxes to the profile tab editor.
	 *
	 * @since 3.36.7
	 *
	 * @param WP_Post $post   The post.
	 * @return mixed The HTML settings output.
	 */

	public function meta_box_callback_profile_tabs( $post ) {

		$defaults = array(
			'allow_tags' => array(),
		);

		$settings = wp_parse_args( get_post_meta( $post->ID, 'wpf-settings', true ), $defaults );

		echo '<input name="wpf-settings[lock_content]" value="1" type="hidden" />'; // Profile tabs are only visible to logged in users anyway so it's okay to set them locked by default

		echo '<p class="wpf-required-tags-select"><label for="wpf-settings-buddypress-allow_tags">' . __( 'Required tags (any)', 'wp-fusion' ) . ':';

		echo '<span class="dashicons dashicons-editor-help wpf-tip wpf-tip-bottom" data-tip="' . __( 'If the user does not have any of these tags, the profile tab will be hidden.', 'wp-fusion' ) . '"></span></label>';

		$args = array(
			'setting'   => $settings['allow_tags'],
			'meta_name' => 'wpf-settings',
			'field_id'  => 'allow_tags',
		);

		wpf_render_tag_multiselect( $args );

		echo '</p>';

	}



	/**
	 * Adds meta boxes to groups
	 *
	 * @access public
	 * @return mixed
	 */

	public function add_meta_box_groups() {

		add_meta_box( 'wpf-buddypress-meta', 'WP Fusion - Group Settings', array( $this, 'meta_box_callback_groups' ), get_current_screen()->id );

		add_meta_box( 'wpf-meta', __( 'WP Fusion', 'wp-fusion' ), array( wp_fusion()->admin_interfaces, 'meta_box_callback' ), get_current_screen()->id, 'side', 'core' );

	}


	/**
	 * Displays meta box content
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback_groups() {

		$gid = $_GET['gid'];

		$settings = array(
			'tag_link' => array(),
		);

		if ( groups_get_groupmeta( $gid, 'wpf-settings-buddypress' ) ) {
			$settings = array_merge( $settings, groups_get_groupmeta( $gid, 'wpf-settings-buddypress' ) );
		}

		echo '<table class="form-table"><tbody>';

		echo '<tr>';

		echo '<th scope="row"><label for="tag_link">' . __( 'Link with Tag', 'wp-fusion' ) . ':</label></th>';
		echo '<td>';

		$args = array(
			'setting' 		=> $settings['tag_link'],
			'meta_name'		=> 'wpf-settings-buddypress',
			'field_id'		=> 'tag_link',
			'placeholder'	=> 'Select Tag',
			'limit'			=> 1
		);

		wpf_render_tag_multiselect( $args );

		echo '<span class="description">' . __( 'Select a tag to link with this group. When the tag is applied, the user will automatically be enrolled. When the tag is removed the user will be unenrolled.', 'wp-fusion' ) . '</span>';
		echo '</td>';

		echo '</tr>';

		echo '</tbody></table>';

	}


	/**
	 * Runs when WPF meta box is saved
	 *
	 * @access public
	 * @return void
	 */

	public function save_groups_data( $post_id ) {

		if ( isset( $_POST['bp-groups-slug'] ) ) {

			// Groups auto-enrollment

			if ( ! empty( $_POST['wpf-settings-buddypress'] ) ) {
				groups_update_groupmeta( $post_id, 'wpf-settings-buddypress', $_POST['wpf-settings-buddypress'] );
			} else {
				groups_delete_groupmeta( $post_id, 'wpf-settings-buddypress' );
			}

			// Groups visibility

			if ( ! empty( $_POST['wpf-settings'] ) ) {
				groups_update_groupmeta( $post_id, 'wpf-settings', $_POST['wpf-settings'] );
			} else {
				groups_delete_groupmeta( $post_id, 'wpf-settings' );
			}
		}

	}

	/**
	 * Update user group enrollment when tags are modified
	 *
	 * @access public
	 * @return void
	 */

	public function update_group_access( $user_id, $user_tags ) {

		// Don't bother if groups component is disabled
		if ( ! function_exists( 'groups_get_groups' ) ) {
			return;
		}

		// Allow searching for hidden groups even if not logged in

		add_filter( 'bp_groups_get_paged_groups_sql', function( $sql ) {
			return str_replace( "WHERE g.status != 'hidden'", '', $sql );
		} );

		$linked_groups = groups_get_groups( array(
			'nopaging'    => true,
			'show_hidden' => true,
			'per_page'    => null, // show all groups
			'meta_query'  => array(
				array(
					'key'     => 'wpf-settings-buddypress',
					'compare' => 'EXISTS',
				),
			),
		) );

		// Update course access based on user tags

		$user_tags = wp_fusion()->user->get_tags( $user_id ); // Get them here for cases where the tags might have changed since wpf_tags_modified was triggered

		// Prevent looping

		remove_action( 'groups_join_group', array( $this, 'join_group' ), 10, 2 );
		remove_action( 'groups_leave_group', array( $this, 'leave_group' ), 10, 2 );

		foreach ( $linked_groups['groups'] as $group ) {

			$settings = groups_get_groupmeta( $group->id, 'wpf-settings-buddypress' );

			if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
				continue;
			}

			$tag_id = $settings['tag_link'][0];

			if ( in_array( $tag_id, $user_tags ) && ! groups_is_user_member( $user_id, $group->id ) ) {

				wpf_log( 'info', $user_id, 'Adding user to BuddyPress group <a href="' . admin_url( 'admin.php?page=bp-groups&gid=' . $group->id . '&action=edit' ) . '">' . $group->name . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

				groups_join_group( $group->id, $user_id );

			} elseif ( ! in_array( $tag_id, $user_tags ) && groups_is_user_member( $user_id, $group->id ) ) {

				wpf_log( 'info', $user_id, 'Removing user from BuddyPress group <a href="' . admin_url( 'admin.php?page=bp-groups&gid=' . $group->id . '&action=edit' ) . '">' . $group->name . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

				groups_leave_group( $group->id, $user_id );

			}
		}

		add_action( 'groups_join_group', array( $this, 'join_group' ), 10, 2 );
		add_action( 'groups_leave_group', array( $this, 'leave_group' ), 10, 2 );

	}

	/**
	 * Runs when user has joined group and applies any linked tags
	 *
	 * @access public
	 * @return void
	 */

	public function join_group( $group_id, $user_id ) {

		$settings = groups_get_groupmeta( $group_id, 'wpf-settings-buddypress' );

		$apply_tags = array();

		if ( ! empty( $settings ) && ! empty( $settings['tag_link'] ) ) {
			$apply_tags = array_merge( $apply_tags, $settings['tag_link'] );
		}

		// Group types (only available in BuddyBoss)

		if ( function_exists( 'bp_groups_get_group_type' ) && function_exists( 'bp_group_get_group_type_id' ) ) {

			$type = bp_groups_get_group_type( $group_id );

			if ( ! empty( $type ) ) {

				$type_id = bp_group_get_group_type_id( $type );

				$settings = get_post_meta( $type_id, 'wpf_settings_buddypress', true );

				if ( ! empty( $settings ) && ! empty( $settings['apply_tags'] ) ) {
					$apply_tags = array_merge( $apply_tags, $settings['apply_tags'] );
				}
			}

		}

		if ( ! empty( $apply_tags ) ) {

			remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

			wp_fusion()->user->apply_tags( $apply_tags, $user_id );

			add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		}

	}

	/**
	 * Runs when user has accepted an invite to join a group
	 *
	 * @access public
	 * @return void
	 */

	public function groups_accept_invite( $user_id, $group_id ) {

		$this->join_group( $group_id, $user_id );

	}

	/**
	 * Runs when user leaves group and removes any linked tags
	 *
	 * @access public
	 * @return void
	 */

	public function leave_group( $group_id, $user_id ) {

		$settings = groups_get_groupmeta( $group_id, 'wpf-settings-buddypress' );

		if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
			return;
		}

		remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		wp_fusion()->user->remove_tags( $settings['tag_link'], $user_id );

		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

	}


	/**
	 * Set the post type label for the groups visibility meta box.
	 *
	 * @since  3.36.7
	 *
	 * @param  string  $post_object_label The post object label.
	 * @param  WP_Post $post              The post object.
	 * @return string  The label.
	 */
	public function groups_meta_box_object_label( $post_object_label, $post ) {

		if ( is_a( $post, 'BP_Groups_Group' ) ) {
			$post_object_label = 'group';
		}

		return $post_object_label;

	}

	/**
	 * Load the group access settings from the wp_bp_groups_groupmeta table.
	 *
	 * @since  3.36.7
	 *
	 * @param  array   $settings The access settings.
	 * @param  WP_Post $post     The post object.
	 * @return array   The settings.
	 */
	public function groups_meta_box_settings( $settings, $post ) {

		if ( is_a( $post, 'BP_Groups_Group' ) ) {
			$settings = wp_parse_args( groups_get_groupmeta( $post->id, 'wpf-settings' ), WPF_Admin_Interfaces::$meta_box_defaults );
		}

		return $settings;

	}

	/**
	 * Load the group access settings from the wp_bp_groups_groupmeta table
	 * during the check to user_can_access()
	 *
	 * @since  3.36.7
	 * @since  3.36.12 Check for empty lock_content to avoid this setting taking
	 *                 priority over menu or widget restrictions when viewing the
	 *                  group
	 *
	 * @param  array $settings The access settings.
	 * @return array The settings.
	 */
	public function groups_access_meta( $settings ) {

		if ( bp_is_group() && empty( $settings['lock_content'] ) ) {

			$group          = groups_get_current_group();
			$group_settings = groups_get_groupmeta( $group->id, 'wpf-settings' );

			if ( ! empty( $group_settings ) ) {
				return $group_settings;
			}
		}

		return $settings;

	}

	/**
	 * If access to a group is denied and no redirect is set, replace the group
	 * content area with the restricted content message.
	 *
	 * @since 3.36.7
	 *
	 * @param int   $post_id The ID of the post to filter the content for.
	 */
	public function filter_group_content( $post_id ) {

		if ( bp_is_group() ) {
			add_filter( 'bp_replace_the_content', '__return_false' );
		}

	}


	/**
	 * Adds meta box to group types
	 *
	 * @access public
	 * @return mixed
	 */

	public function add_meta_box_group_types() {

		add_meta_box( 'wpf-buddypress-meta', 'WP Fusion - Group Type Settings', array( $this, 'meta_box_callback_group_types' ) );

	}

	/**
	 * Displays meta box content
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback_group_types() {

		global $post;

		$settings = array(
			'apply_tags' => array(),
		);

		if ( get_post_meta( $post->ID, 'wpf_settings_buddypress', true ) ) {
			$settings = array_merge( $settings, get_post_meta( $post->ID, 'wpf_settings_buddypress', true ) );
		}

		echo '<table class="form-table"><tbody>';

		echo '<tr>';

		echo '<th scope="row"><label for="apply_tags">' . __( 'Apply tags', 'wp-fusion' ) . ':</label></th>';
		echo '<td>';

		$args = array(
			'setting' 		=> $settings['apply_tags'],
			'meta_name'		=> 'wpf_settings_buddypress',
			'field_id'		=> 'apply_tags',
		);

		wpf_render_tag_multiselect( $args );

		echo '<span class="description">' . __( 'Apply these tags when a user joins a group of this type.', 'wp-fusion' ) . '</span>';
		echo '</td>';

		echo '</tr>';

		echo '</tbody></table>';

	}

	/**
	 * Runs when WPF meta box is saved
	 *
	 * @access public
	 * @return void
	 */

	public function save_group_type_meta_box_data( $post_id ) {

		if ( isset( $_POST['post_type'] ) && $_POST['post_type'] == 'bp-group-type' ) {

			if ( isset( $_POST['wpf_settings_buddypress'] ) ) {
				update_post_meta( $post_id, 'wpf_settings_buddypress', $_POST['wpf_settings_buddypress'] );
			} else {
				delete_post_meta( $post_id, 'wpf_settings_buddypress' );
			}

		}

	}


	/**
	 * Registers WP Fusion's access control module in BuddyBoss Platform Pro.
	 *
	 * @since  3.36.10
	 *
	 * @param  array $access_controls The access controls.
	 * @return array The access controls.
	 */
	public function get_access_control_lists( $access_controls ) {

		$access_controls['wp_fusion'] = array(
			'label'      => sprintf( __( '%s Tag', 'wp-fusion' ), wp_fusion()->crm->name ),
			'is_enabled' => true,
			'class'      => WPF_BuddyBoss_Access_Control::class,
		);

		return $access_controls;

	}

	/**
	 * Support for the BP Username Changer addon
	 *
	 * @access public
	 * @return void
	 */

	public function username_changed( $new_username, $userdata, $user ) {

		wp_fusion()->user->push_user_meta( $user->ID, array( 'user_login' => $new_username ) );

	}

	/**
	 * Adds profile type meta box
	 *
	 * @access public
	 * @return mixed
	 */

	public function add_profile_type_meta_box( $post_id, $data ) {

		add_meta_box( 'wpf-buddypress-profile-type-meta', 'WP Fusion - Profile Type Settings', array( $this, 'meta_box_callback_profile_type' ), 'bp-member-type' );

	}

	/**
	 * Displays meta box content
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback_profile_type( $post ) {

		$defaults = array(
			'tag_link' => array(),
		);

		$settings = get_post_meta( $post->ID, 'wpf_settings_buddypress', true );

		if ( ! empty( $settings ) ) {
			$settings = array_merge( $defaults, $settings );
		} else {
			$settings = $defaults;
		}

		echo '<table class="form-table"><tbody>';

		echo '<tr>';

		echo '<th scope="row"><label for="tag_link">' . __( 'Link with Tag', 'wp-fusion' ) . ':</label></th>';
		echo '<td>';

		$args = array(
			'setting'     => $settings['tag_link'],
			'meta_name'   => 'wpf_settings_buddypress',
			'field_id'    => 'tag_link',
			'placeholder' => __( 'Select Tag', 'wp-fusion' ),
			'limit'       => 1,
		);

		wpf_render_tag_multiselect( $args );

		echo '<span class="description">' . __( 'Select a tag to link with this profile type. When the tag is applied the user will automatically be given the profile type. When the tag is removed the profile type will be removed.', 'wp-fusion' ) . '</span>';
		echo '</td>';

		echo '</tr>';

		echo '</tbody></table>';

	}

	/**
	 * Runs when WPF meta box is saved
	 *
	 * @access public
	 * @return void
	 */

	public function save_profile_type_meta_box_data( $post_id ) {

		if ( isset( $_POST['post_type'] ) && $_POST['post_type'] == 'bp-member-type' ) {

			// Profile types

			if ( isset( $_POST['wpf_settings_buddypress'] ) ) {
				$data = $_POST['wpf_settings_buddypress'];
			} else {
				$data = array();
			}

			update_post_meta( $post_id, 'wpf_settings_buddypress', $data );

		}

	}

	/**
	 * Update user profile type assignments when tags are modified
	 *
	 * @access public
	 * @return void
	 */

	public function update_profile_types( $user_id, $user_tags ) {

		if ( ! function_exists( 'bp_get_member_type' ) || ! function_exists( 'bp_member_type_enable_disable' ) ) {
			return;
		}

		if ( false === bp_member_type_enable_disable() ) {
			return;
		}

		$member_types = bp_get_member_type( $user_id, false );

		if ( empty( $member_types ) ) {
			$member_types = array();
		}

		$linked_types = get_posts( array(
			'post_type'  => 'bp-member-type',
			'nopaging'   => true,
			'meta_query' => array(
				array(
					'key'     => 'wpf_settings_buddypress',
					'compare' => 'EXISTS'
				),
			),
		) );

		// Update profile types based on user tags

		if ( ! empty( $linked_types ) ) {

			$user_tags = wp_fusion()->user->get_tags( $user_id ); // Get them here for cases where the tags might have changed since wpf_tags_modified was triggered

			//
			// Add types
			//

			foreach ( $linked_types as $type ) {

				// Since adding a type automatically removes the other types, we'll start with that

				$settings = get_post_meta( $type->ID, 'wpf_settings_buddypress', true );

				if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
					continue;
				}

				$linked_tag_id = $settings['tag_link'][0];

				if ( in_array( $linked_tag_id, $user_tags ) && ! in_array( $type->post_name, $member_types ) ) {

					wpf_log( 'info', $user_id, 'Adding user to BuddyPress profile type <a href="' . admin_url( 'post.php?post=' . $type->ID . '&action=edit' ) . '">' . $type->post_title . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $linked_tag_id ) . '</strong>' );

					// Prevent looping

					remove_action( 'bp_set_member_type', array( $this, 'set_member_type' ), 10, 2 );

					bp_set_member_type( $user_id, $type->post_name );

					add_action( 'bp_set_member_type', array( $this, 'set_member_type' ), 10, 3 );

					return; // Someone can only be in one type at a time, so let's quit here

				} elseif ( in_array( $linked_tag_id, $user_tags ) && in_array( $type->post_name, $member_types ) ) {

					// If the user has the tag and is in the type, we can also quit, since there's nothing more to be done

					return;

				}
			}

			//
			// Remove types
			//

			foreach ( $linked_types as $type ) {

				// Now handle cases where a tag might have been removed and we need to remove the type

				$settings = get_post_meta( $type->ID, 'wpf_settings_buddypress', true );

				if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
					continue;
				}

				if ( ! in_array( $linked_tag_id, $user_tags ) && in_array( $type->post_name, $member_types ) ) {

					$default = bp_member_type_default_on_registration();

					$msg = 'Removing user from BuddyPress profile type <a href="' . admin_url( 'post.php?post=' . $type->ID . '&action=edit' ) . '">' . $type->post_title . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $linked_tag_id ) . '</strong>';

					if ( ! empty( $default ) ) {
						$msg .= ', setting default profile type.';
					}

					wpf_log( 'info', $user_id, $msg );

					// Prevent looping

					remove_action( 'bp_set_member_type', array( $this, 'set_member_type' ), 10, 2 );

					if ( ! empty( $default ) ) {

						// Set them to the site default
						bp_set_member_type( $user_id, $default );

					} else {

						// Remove the type (no default available so they'll be left type-less)

						bp_set_member_type( $user_id, false );

					}

					add_action( 'bp_set_member_type', array( $this, 'set_member_type' ), 10, 2 );

					return; // Someone can only be in one type at a time, so let's quit here

				}
			}
		}

	}

	/**
	 * Apply linked tags when a profile type is set
	 *
	 * @access public
	 * @return void
	 */

	public function set_member_type( $user_id, $new_member_type, $append = false ) {

		if ( ! function_exists( 'bp_member_type_post_by_type' ) ) {
			return;
		}

		$new_type_id = bp_member_type_post_by_type( $new_member_type );

		if ( empty( $new_type_id ) ) {
			return;
		}

		/* Removed in v3.36.16

		// If the type isn't being appended then we need to remove any linked tags from the other types.
		// Unfortunately BuddyBoss doesn't fire bp_remove_member_type before setting the new type so we don't know what the previous type was.

		$remove_tags = array();

		if ( false == $append ) {

			$member_types = bp_get_member_types();

			foreach ( $member_types as $member_type ) {

				if ( $member_type == $new_member_type ) {
					continue;
				}

				$type_id = bp_member_type_post_by_type( $member_type );

				$settings = get_post_meta( $type_id, 'wpf_settings_buddypress', true );

				if ( ! empty( $settings ) && ! empty( $settings['tag_link'] ) ) {

					$remove_tags = array_merge( $remove_tags, $settings['tag_link'] );

				}
			}
		} */

		// Prevent looping

		remove_action( 'wpf_tags_modified', array( $this, 'update_profile_types' ), 10, 2 );

		// Now maybe apply the tags for this type

		$settings = get_post_meta( $new_type_id, 'wpf_settings_buddypress', true );

		if ( ! empty( $settings ) && ! empty( $settings['tag_link'] ) ) {

			wpf_log( 'info', $user_id, 'User added to BuddyPress profile type <a href="' . admin_url( 'post.php?post=' . $new_type_id . '&action=edit' ) . '">' . $new_member_type->labels['singular_name'] . '</a>. Applying tags.' );
			wp_fusion()->user->apply_tags( $settings['tag_link'], $user_id );

		}

		add_action( 'wpf_tags_modified', array( $this, 'update_profile_types' ), 10, 2 );

		// Sync the name

		$new_member_type = bp_get_member_type_object( $new_member_type );

		$update_data = array(
			'bbp_profile_type' => $new_member_type->labels['singular_name'],
		);

		wp_fusion()->user->push_user_meta( $user_id, $update_data );

	}

	/**
	 * Remove linked tags when a profile type is removed
	 *
	 * @access public
	 * @return void
	 */

	public function remove_member_type( $user_id, $member_type ) {

		if ( ! function_exists( 'bp_member_type_post_by_type' ) ) {
			return;
		}

		$type_id = bp_member_type_post_by_type( $member_type );

		if ( empty( $type_id ) ) {
			return;
		}

		$settings = get_post_meta( $type_id, 'wpf_settings_buddypress', true );

		if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
			return;
		}

		// Prevent looping

		remove_action( 'wpf_tags_modified', array( $this, 'update_profile_types' ), 10, 2 );

		wpf_log( 'info', $user_id, 'User remove from BuddyPress profile type <a href="' . admin_url( 'post.php?post=' . $type_id . '&action=edit' ) . '">' . $member_type->labels['singular_name'] . '</a>. Removing tags.' );

		wp_fusion()->user->remove_tags( $settings['tag_link'], $user_id );

		add_action( 'wpf_tags_modified', array( $this, 'update_profile_types' ), 10, 2 );

	}

	/**
	 * Removes posts from restricted forums from BuddyBoss activity stream
	 *
	 * @access public
	 * @return array Activity
	 */

	public function filter_activity_stream( $activity, $args ) {

		$setting = wp_fusion()->settings->get( 'hide_archives' );

		if ( 'standard' == $setting || 'advanced' == $setting ) {

			foreach ( $activity['activities'] as $i => $item ) {

				// Generic filtering on secondary item ID

				if ( ! empty( $item->secondary_item_id ) && ! wp_fusion()->access->user_can_access( $item->secondary_item_id ) ) {
					unset( $activity['activities'][ $i ] );
				}
			}

			// Clean up the array after unsetting stuff
			$activity['activities'] = array_values( $activity['activities'] );

		}

		return $activity;

	}

	/**
	 * If we're syncing a LearnDash group enrollment to BuddyPress, make sure that the linked tag from the group is applied
	 *
	 * @access public
	 * @return void
	 */

	public function groups_member_after_save( $group_member ) {

		global $bp_ld_sync__syncing_to_buddypress;

		if ( true == $bp_ld_sync__syncing_to_buddypress ) {

			$this->join_group( $group_member->group_id, $group_member->user_id );

		}

	}

	/**
	 * Prevent linked tags from getting removed if a BB group member is promoted to organizer or mod in a BB group that's linked to an LD group that has an auto-enrollment tag
	 *
	 * @access public
	 * @return void
	 */

	public function removing_group_access( $user_id, $group_id ) {

		global $bp_ld_sync__syncing_to_learndash;

		if ( true == $bp_ld_sync__syncing_to_learndash ) {

			remove_action( 'ld_removed_group_access', array( wp_fusion()->integrations->learndash, 'removed_group_access' ), 10, 2 );

		}

	}

	/**
	 * Allow displaying BuddyPress data using the [user_meta] shortcode
	 *
	 * @access public
	 * @return string Value
	 */

	public function user_meta_shortcode_value( $value, $field ) {

		if ( ! class_exists( 'BP_XProfile_ProfileData' ) ) {
			return $value;
		}

		$id = str_replace( 'bbp_field_', '', $field );

		$user_data = BP_XProfile_ProfileData::get_all_for_user( bp_loggedin_user_id() );

		if ( ! empty( $user_data ) ) {

			foreach ( $user_data as $name => $field_data ) {

				if ( is_array( $field_data ) && ( $field_data['field_id'] == $id || $name == $field ) ) {
					$value = $field_data['field_data'];
				}
			}
		}

		return $value;

	}



	/**
	 * BuddyPress-specific settings.
	 *
	 * @since  3.29.5
	 *
	 * @param  array $settings The settings.
	 * @param  array $options  The options.
	 * @return array The settings.
	 */
	public function register_settings( $settings, $options ) {

		// BuddyPress uses the username on the frontend of the site so we'll set the default for newly imported users to be FirstnameLastname

		$settings['username_format']['std'] = 'flname';

		$settings['bp_header'] = array(
			'title'   => __( 'BuddyPress Integration', 'wp-fusion' ),
			'type'    => 'heading',
			'section' => 'integrations',
		);

		$settings['bp_defer'] = array(
			'title'   => __( 'Defer Until Activation', 'wp-fusion' ),
			'desc'    => sprintf( __( 'Don\'t send any data to %s until the account has been activated, either by an administrator or via email activation.', 'wp-fusion' ), wp_fusion()->crm->name ),
			'std'     => 0,
			'type'    => 'checkbox',
			'section' => 'integrations',
		);

		$settings['bp_apply_tags_profile_complete'] = array(
			'title'   => __( 'Apply Tags - Profile Complete', 'wp-fusion' ),
			'desc'    => __( 'The selected tags will be applied when a user reaches 100% profile completeness (using the Profile Completion Widget).', 'wp-fusion' ),
			'type'    => 'assign_tags',
			'section' => 'integrations',
		);

		return $settings;

	}


	/**
	 * //
	 * // BATCH TOOLS
	 * //
	 **/

	/**
	 * Adds WooCommerce checkbox to available export options
	 *
	 * @access public
	 * @return array Options
	 */

	public function export_options( $options ) {

		if ( function_exists( 'groups_get_groups' ) ) {

			$options['buddypress_groups'] = array(
				'label'   => __( 'BuddyPress groups statuses', 'wp-fusion' ),
				'title'   => __( 'Users', 'wp-fusion' ),
				'tooltip' => __( 'Applies tags to all group members based on their current group and group type enrollments, using the WP Fusion settings for each group. <br /><br />Does not trigger any automated group enrollments.', 'wp-fusion' ),
			);

		}

		if ( function_exists( 'bp_get_member_type' ) && function_exists( 'bp_member_type_enable_disable' ) ) {

			$options['buddyboss_profile_types'] = array(
				'label'   => __( 'BuddyBoss profile type statuses', 'wp-fusion' ),
				'title'   => __( 'Users', 'wp-fusion' ),
				'tooltip' => __( 'Applies tags to all members based on their current profile type assignments, using the WP Fusion settings on each profile type. <br /><br />Does not assign or remove any profile types.', 'wp-fusion' ),
			);

		}

		return $options;

	}

	/**
	 * Counts total number of users to be processed
	 *
	 * @access public
	 * @return int Count
	 */

	public function batch_init() {

		$args = array(
			'fields' => 'ID',
		);

		$users = get_users( $args );

		wpf_log( 'info', 0, 'Beginning <strong>BuddyPress groups / profile types statuses</strong> batch operation on ' . count( $users ) . ' users', array( 'source' => 'buddypress' ) );

		return $users;

	}

	/**
	 * Checks groups for each user and applies tags
	 *
	 * @access public
	 * @return void
	 */

	public function batch_step_groups( $user_id ) {

		$groups = bp_get_user_groups( $user_id );

		if ( ! empty( $groups ) ) {

			foreach ( $groups as $group ) {

				$this->join_group( $group->group_id, $user_id );

			}
		}

	}


	/**
	 * Checks profile types for each user and applies tags
	 *
	 * @access public
	 * @return void
	 */

	public function batch_step_profile_types( $user_id ) {

		$member_types = bp_get_member_type( $user_id, false );

		if ( ! empty( $member_types ) ) {

			foreach ( $member_types as $type ) {

				$this->set_member_type( $user_id, $type );

			}
		}

	}


}

new WPF_BuddyPress;

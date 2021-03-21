<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class WPF_bbPress extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @access  public
	 * @return  void
	 */

	public function init() {

		$this->slug = 'bbpress';

		// Settings
		add_filter( 'wpf_configure_settings', array( $this, 'register_settings' ), 15, 2 );

		add_filter( 'bbp_get_forum_class', array( $this, 'get_forum_class' ), 10, 2 );

		add_filter( 'wpf_user_update', array( $this, 'profile_update' ), 10, 2 );
		add_filter( 'wp_pre_insert_user_data', array( $this, 'sync_email_address_changes' ), 10, 3 );

		add_action( 'wpf_filtering_page_content', array( $this, 'prepare_content_filter' ) );
		add_action( 'wpf_begin_redirect', array( $this, 'begin_redirect' ) );
		add_filter( 'wpf_redirect_post_id', array( $this, 'redirect_post_id' ) );
		add_filter( 'wpf_user_can_access_post_id', array( $this, 'user_can_access_post_id' ) );
		add_filter( 'wpf_post_access_meta', array( $this, 'inherit_permissions_from_forum' ), 10, 2 );

	}

	/**
	 * Registers bbPress settings
	 *
	 * @access  public
	 * @return  array Settings
	 */

	public function register_settings( $settings, $options ) {

		$settings['bbp_header'] = array(
			'title'   => __( 'bbPress Integration', 'wp-fusion' ),
			'type'    => 'heading',
			'section' => 'integrations',
		);

		$settings['bbp_lock'] = array(
			'title'   => __( 'Restrict Archives', 'wp-fusion' ),
			'desc'    => sprintf( __( 'Restrict access to forums archive (%s/forums/)', 'wp-fusion' ), home_url() ),
			'type'    => 'checkbox',
			'section' => 'integrations',
			'unlock'  => array( 'bbp_lock_all', 'bbp_allow_tags', 'bbp_redirect' ),
		);

		$settings['bbp_lock_all'] = array(
			'title'   => __( 'Restrict Forums', 'wp-fusion' ),
			'desc'    => __( 'Restrict access to all forums in addition to the archive', 'wp-fusion' ),
			'type'    => 'checkbox',
			'section' => 'integrations',
		);

		$settings['bbp_allow_tags'] = array(
			'title'   => __( 'Required tags (any)', 'wp-fusion' ),
			'desc'    => __( 'If the user doesn\'t have any of the tags specified, they will be redirected to the URL below. You must specify a redirect for forum restriction to work.', 'wp-fusion' ),
			'type'    => 'assign_tags',
			'section' => 'integrations',
		);

		$settings['bbp_redirect'] = array(
			'title'   => __( 'Redirect URL', 'wp-fusion' ),
			'type'    => 'text',
			'std'     => home_url(),
			'section' => 'integrations',
		);

		return $settings;

	}


	/**
	 * Sets topics to inherit permissions from their forums
	 *
	 * @access  public
	 * @return  int Post ID
	 */

	public function redirect_post_id( $post_id ) {

		if ( 'topic' == get_post_type( $post_id ) ) {

			$settings = get_post_meta( $post_id, 'wpf-settings', true );

			if ( empty( $settings ) || empty( $settings['lock_content'] ) ) {

				// If the discussion is open then inherit permissions from the parent forum

				$forum_id = get_post_meta( $post_id, '_bbp_forum_id', true );

				if ( ! empty( $forum_id ) ) {
					$post_id = $forum_id;
				}
			}
		}

		// In BuddyBoss a forum can be displayed as a tab on a group, which bypasses the normal template_redirect

		if ( empty( $post_id ) && function_exists( 'bp_is_current_action' ) && bp_is_current_action( 'forum' ) ) {

			$forum_ids = bbp_get_group_forum_ids( bp_get_current_group_id() );

			if ( ! empty( $forum_ids ) ) {
				$post_id = array_shift( $forum_ids );
			}
		}

		return $post_id;

	}

	/**
	 * Inherit protections for replies from the topic
	 *
	 * @access  public
	 * @return  int Post ID
	 */

	public function user_can_access_post_id( $post_id ) {

		if ( 'reply' == get_post_type( $post_id ) ) {

			$post_id = get_post_meta( $post_id, '_bbp_topic_id', true );

		}

		return $post_id;

	}

	/**
	 * Inherit protections for replies from the topic
	 *
	 * @access  public
	 * @return  array Access Meta
	 */

	public function inherit_permissions_from_forum( $access_meta, $post_id ) {

		if ( empty( $access_meta ) || empty( $access_meta['lock_content'] ) ) {

			$post_type = get_post_type( $post_id );

			if ( 'topic' == $post_type ) {

				$forum_id = get_post_meta( $post_id, '_bbp_forum_id', true );

				$access_meta = get_post_meta( $forum_id, 'wpf-settings', true );

			}

			if ( 'topic' == $post_type || 'forum' == $post_type ) {

				if ( empty( $access_meta ) || empty( $access_meta['lock_content'] ) && wp_fusion()->settings->get( 'bbp_lock_all' ) ) {

					// Inherit from site
					$access_meta = array(
						'lock_content' => true,
						'allow_tags'   => wp_fusion()->settings->get( 'bbp_allow_tags', array() ),
						'redirect_url' => wp_fusion()->settings->get( 'bbp_redirect', home_url() ),
					);
				}
			}
		}

		return $access_meta;

	}

	/**
	 * Re-add the content filter after bbPress has removed it for theme compatibility
	 *
	 * @access public
	 * @return void
	 */

	public function prepare_content_filter( $post_id ) {

		add_action( 'bbp_head', array( $this, 'add_content_filter' ) );

	}


	/**
	 * Re-add the content filter after bbPress has removed it for theme compatibility
	 *
	 * @access public
	 * @return void
	 */

	public function add_content_filter( $post_id ) {

		add_filter( 'the_content', array( wp_fusion()->access, 'restricted_content_filter' ) );

	}

	/**
	 * Enables redirects for bbP forum archives
	 *
	 * @access public
	 * @return void
	 */

	public function begin_redirect() {

		global $post;

		if ( ! is_object( $post ) ) {
			return false;
		}

		// Check if forum archive is locked
		if ( ( bbp_is_forum_archive() && wp_fusion()->settings->get( 'bbp_lock' ) == true ) || ( bbp_is_forum( $post->ID ) && wp_fusion()->settings->get( 'bbp_lock_all' ) == true ) ) {

			$redirect = wp_fusion()->settings->get( 'bbp_redirect' );

			$redirect = apply_filters( 'wpf_redirect_url', $redirect, $post_id = false );

			if ( empty( $redirect ) ) {
				return;
			}

			if ( ! wpf_is_user_logged_in() ) {
				wp_redirect( $redirect );
				exit();
			}

			$user_id = wpf_get_current_user_id();

			// If admins are excluded from restrictions
			if ( wp_fusion()->settings->get( 'exclude_admins' ) == true && user_can( $user_id, 'manage_options' ) ) {
				return;
			}

			$user_tags = wp_fusion()->user->get_tags( $user_id );

			$allow_tags = wp_fusion()->settings->get( 'bbp_allow_tags' );

			if ( empty( array_intersect( $user_tags, $allow_tags ) ) ) {
				wp_redirect( $redirect );
				exit();
			}
		}

		return false;

	}


	/**
	 * Applies a class to bbPress forums if they're locked
	 *
	 * @access  public
	 * @return  array Classes
	 */

	public function get_forum_class( $classes, $forum_id ) {

		if ( ! wp_fusion()->access->user_can_access( $forum_id ) ) {
			$classes[] = 'wpf-locked';
		}

		return $classes;

	}

	/**
	 * Sync bbPress frontend profile updates.
	 *
	 * @since  3.36.8
	 *
	 * @param  array $user_meta The user meta.
	 * @param  int $user_id   The user identifier.
	 * @return array  $data The profile data.
	 */
	public function profile_update( $user_meta, $user_id ) {

		if ( isset( $_REQUEST['bbp_user_edit_submit'] ) ) {

			$field_map = array(
				'email'         => 'user_email',
				'url'           => 'user_url',
				'pass1-text'    => 'user_pass',
				'user_password' => 'user_pass',
				'pass1'         => 'user_pass',
			);

			$user_meta = $this->map_meta_fields( $user_meta, $field_map );

		}

		return $user_meta;

	}

	/**
	 * Sync frontend email address changes after they've been confirmed
	 *
	 * @since  3.36.8
	 *
	 * @param  array $user_meta The user meta.
	 * @param  bool  $update    Updating vs. new user.
	 * @param  int   $user_id   The user ID being updated.
	 * @return array $data The profile data.
	 */
	public function sync_email_address_changes( $user_meta, $update, $user_id ) {

		if ( isset( $_REQUEST['action'] ) && 'bbp-update-user-email' == $_REQUEST['action'] ) {
			wp_fusion()->user->push_user_meta( $user_id, array( 'user_email' => $user_meta['user_email'] ) );
		}

		return $user_meta;

	}


}

new WPF_bbPress;

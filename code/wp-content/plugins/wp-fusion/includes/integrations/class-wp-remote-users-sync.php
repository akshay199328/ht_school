<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class WPF_WP_Remote_Users_Sync extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @access  public
	 * @since   3.35.9
	 * @return  void
	 */

	public function init() {

		$this->slug = 'wp-remote-users-sync';

		// add_filter( 'wprus_settings', array( $this, 'register_meta_fields' ), 10, 2 );
		add_filter( 'wprus_action_data', array( $this, 'merge_contact_data' ), 10, 3 );

		// Catch incoming tag changes
		add_action( 'wprus_after_handle_action_notification', array( $this, 'handle_action_notification' ), 10, 3 );

	}


	/**
	 * Register contact ID and tags fields for automatic sync on profile update (off for now)
	 *
	 * @access public
	 * @return array Option
	 */

	public function register_meta_fields( $settings ) {

		if ( ! empty( $settings['sites'] ) ) {

			foreach ( $settings['sites'] as $i => $site ) {

				$tags_key = wp_fusion()->crm->slug . '_tags';
				$cid_key  = wp_fusion()->crm->slug . '_contact_id';

				if ( ! in_array( $tags_key, $site['incoming_meta'] ) ) {
					$settings['sites'][ $i ]['incoming_meta'][] = $tags_key;
				}

				if ( ! in_array( $cid_key, $site['incoming_meta'] ) ) {
					$settings['sites'][ $i ]['incoming_meta'][] = $cid_key;
				}

				if ( ! in_array( $tags_key, $site['outgoing_meta'] ) ) {
					$settings['sites'][ $i ]['outgoing_meta'][] = $tags_key;
				}

				if ( ! in_array( $cid_key, $site['outgoing_meta'] ) ) {
					$settings['sites'][ $i ]['outgoing_meta'][] = $cid_key;
				}
			}
		}

		return $settings;

	}

	/**
	 * Merge the CID and tags into the create and update requests
	 *
	 * @access public
	 * @return array Data
	 */

	public function merge_contact_data( $data, $endpoint, $url ) {

		if ( 'create' == $endpoint || 'update' == $endpoint ) {

			$user = get_user_by( 'login', $data['username'] );

			if ( $user ) {

				$contact_id = wp_fusion()->user->get_contact_id( $user->ID );

				if ( ! empty( $contact_id ) ) {

					$data[ wp_fusion()->crm->slug . '_contact_id' ] = $contact_id;
					$data[ wp_fusion()->crm->slug . '_tags' ]       = wp_fusion()->user->get_tags( $user->ID );

					wpf_log( 'info', $user->ID, 'Synced tags to remote site ' . $url, array( 'tag_array' => $data[ wp_fusion()->crm->slug . '_tags' ] ) );

				}
			}
		}

		return $data;

	}

	/**
	 * Trigger appropriate actions when tags are modified via incoming request
	 *
	 * @access public
	 * @return void
	 */

	public function handle_action_notification( $endpoint, $data, $result ) {

		if ( true == $result && ( 'update' == $endpoint || 'create' == $endpoint ) ) {

			if ( ! empty( $data[ wp_fusion()->crm->slug . '_contact_id' ] ) ) {

				$user = get_user_by( 'login', $data['username'] );

				if ( $user ) {
					$user_id = $user->ID;
				} else {
					$user_id = wpf_get_user_id( $data[ wp_fusion()->crm->slug . '_contact_id' ] ); // try to get it from an existing contact ID
				}

				if ( false !== $user_id ) {

					update_user_meta( $user_id, wp_fusion()->crm->slug . '_contact_id', $data[ wp_fusion()->crm->slug . '_contact_id' ] );

					if ( isset( $data[ wp_fusion()->crm->slug . '_tags' ] ) ) {

						wp_fusion()->user->set_tags( $data[ wp_fusion()->crm->slug . '_tags' ], $user_id );

					}
				}
			}
		}

	}


}

new WPF_WP_Remote_Users_Sync();

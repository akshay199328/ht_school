<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPF_Events_Manager extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @access  public
	 * @since   3.33
	 * @return  void
	 */

	public function init() {

		$this->name = 'Events Manager';
		$this->slug = 'events-manager';

		add_filter( 'em_booking_add_registration_result', array( $this, 'add_registration' ), 10, 3 );

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ), 10, 2 );
		add_action( 'save_post_event', array( $this, 'save_meta_box_data' ) );

		add_filter( 'wpf_meta_field_groups', array( $this, 'add_meta_field_group' ), 10 );
		add_filter( 'wpf_meta_fields', array( $this, 'prepare_meta_fields' ), 20 );

	}

	/**
	 * Apply tags and sync data after event registration
	 *
	 * @access public
	 * @return object Registration
	 */

	public function add_registration( $registration, $booking, $notices ) {

		$settings = get_post_meta( $booking->event->post_id, 'wpf_settings_event', true );

		if ( ! empty( $settings ) && ! empty( $settings['apply_tags'] ) ) {
			wp_fusion()->user->apply_tags( $settings['apply_tags'], $booking->person_id );
		}

		$update_data = array_merge( $booking->booking_meta['registration'], $booking->booking_meta['booking'] );

		$event = em_get_event( $booking->event->post_id, 'post_id' );

		$event_data = array(
			'event_name' => $event->event_name,
			'event_date' => get_post_meta( $booking->event->post_id, '_event_start', true ),
			'event_time' => get_post_meta( $booking->event->post_id, '_event_start_time', true ),
		);

		$update_data = array_merge( $update_data, $event_data );

		// Ticket

		if ( ! empty( $booking->tickets_bookings->tickets_bookings ) ) {
			$ticket                     = reset( $booking->tickets_bookings->tickets_bookings );
			$ticket                     = $ticket->get_ticket();
			$update_data['ticket_name'] = $ticket->name;
		}

		// Location

		$location = $event->get_location();

		if ( $location->location_id ) {
			$update_data['event_location_name']    = $location->location_name;
			$update_data['event_location_address'] = $location->get_full_address();
		}

		wp_fusion()->user->push_user_meta( $booking->person_id, $update_data );

		return $registration;

	}


	/**
	 * Adds meta box
	 *
	 * @access public
	 * @return void
	 */

	public function add_meta_box( $post_id, $data ) {

		add_meta_box( 'wpf-event-meta', 'WP Fusion - Event Settings', array( $this, 'meta_box_callback' ), 'event' );

	}

	/**
	 * Displays meta box content
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback( $post ) {

		$settings = array(
			'apply_tags' => array(),
		);

		if ( get_post_meta( $post->ID, 'wpf_settings_event', true ) ) {
			$settings = array_merge( $settings, get_post_meta( $post->ID, 'wpf_settings_event', true ) );
		}

		echo '<table class="form-table"><tbody>';

		echo '<tr>';

		echo '<th scope="row"><label for="apply_tags">' . __( 'Apply tags', 'wp-fusion' ) . ':</label></th>';
		echo '<td>';

		$args = array(
			'setting'   => $settings['apply_tags'],
			'meta_name' => 'wpf_settings_event',
			'field_id'  => 'apply_tags',
		);

		wpf_render_tag_multiselect( $args );

		echo '<span class="description">' . sprintf( __( 'The selected tags will be applied in %s when someone registers for this event.', 'wp-fusion' ), wp_fusion()->crm->name ) . '</span>';
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

	public function save_meta_box_data( $post_id ) {

		// Update the meta field in the database.

		if ( ! empty( $_POST['wpf_settings_event'] ) ) {
			update_post_meta( $post_id, 'wpf_settings_event', $_POST['wpf_settings_event'] );
		} else {
			delete_post_meta( $post_id, 'wpf_settings_event' );
		}

	}


	/**
	 * Adds field group for Tribe Tickets to contact fields list
	 *
	 * @access  public
	 * @return  array Meta fields
	 */

	public function add_meta_field_group( $field_groups ) {

		$field_groups['events_manager_user'] = array(
			'title'  => 'Events Manager - User',
			'fields' => array(),
		);

		$field_groups['events_manager_event'] = array(
			'title'  => 'Events Manager - Event',
			'fields' => array(),
		);

		$field_groups['events_manager_booking'] = array(
			'title'  => 'Events Manager - Booking',
			'fields' => array(),
		);

		return $field_groups;

	}

	/**
	 * Sets field labels and types for event fields
	 *
	 * @access  public
	 * @return  array Meta fields
	 */

	public function prepare_meta_fields( $meta_fields ) {

		// Custom user fields

		$user_fields = get_option( 'em_user_fields', array() );

		foreach ( $user_fields as $meta_key => $field ) {

			$meta_fields[ $meta_key ] = array(
				'label' => $field['label'],
				'type'  => $field['type'],
				'group' => 'events_manager_user',
			);
		}

		// Event fields

		$meta_fields['ticket_name'] = array(
			'label' => 'Ticket Name',
			'type'  => 'text',
			'group' => 'events_manager_event',
		);

		$meta_fields['event_name'] = array(
			'label' => 'Event Name',
			'type'  => 'text',
			'group' => 'events_manager_event',
		);

		$meta_fields['event_date'] = array(
			'label' => 'Event Date',
			'type'  => 'date',
			'group' => 'events_manager_event',
		);

		$meta_fields['event_time'] = array(
			'label' => 'Event Time',
			'type'  => 'text',
			'group' => 'events_manager_event',
		);

		$meta_fields['event_location_name'] = array(
			'label' => 'Event Location Name',
			'type'  => 'text',
			'group' => 'events_manager_event',
		);

		$meta_fields['event_location_address'] = array(
			'label' => 'Event Location Address',
			'type'  => 'text',
			'group' => 'events_manager_event',
		);

		// Custom booking fields

		if ( defined( 'EM_META_TABLE' ) ) {

			global $wpdb;
			$forms_data = $wpdb->get_results( "SELECT meta_id, meta_value FROM " . EM_META_TABLE . " WHERE meta_key = 'booking-form'" );

			foreach ( $forms_data as $form_data ) {

				$form = unserialize( $form_data->meta_value );

				foreach ( $form['form'] as $meta_key => $field ) {

					if ( ! isset( $meta_fields[ $meta_key ] ) ) {

						$meta_fields[ $meta_key ] = array(
							'label' => $field['label'],
							'type'  => $field['type'],
							'group' => 'events_manager_booking',
						);

					}
				}
			}
		}

		return $meta_fields;

	}

}

new WPF_Events_Manager();

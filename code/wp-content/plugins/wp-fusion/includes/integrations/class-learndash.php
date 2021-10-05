<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



class WPF_LearnDash extends WPF_Integrations_Base {

	/**
	 * Gets things started
	 *
	 * @access  public
	 * @since   1.0
	 * @return  void
	 */

	public function init() {

		$this->slug = 'learndash';

		add_action( 'learndash_course_completed', array( $this, 'course_completed' ), 5 );
		add_action( 'learndash_lesson_completed', array( $this, 'lesson_completed' ), 5 );
		add_action( 'learndash_quiz_completed', array( $this, 'quiz_completed' ), 5, 2 );
		add_action( 'learndash_topic_completed', array( $this, 'topic_completed' ), 5 );
		add_action( 'learndash_new_essay_submitted', array( $this, 'essay_submitted' ), 5, 2 );
		add_action( 'ldadvquiz_answered', array( $this, 'quiz_answered' ), 10, 3 );
		add_action( 'learndash_assignment_uploaded', array( $this, 'assignment_uploaded' ), 10, 2 );
		add_action( 'learndash_update_user_activity', array( $this, 'update_user_activity' ) );
		add_filter( 'learndash_access_redirect', array( $this, 'lesson_access_redirect' ), 10, 2 );

		// ThriveCart
		add_action( 'learndash_thrivecart_after_create_user', array( $this, 'thrivecart_after_create_user' ), 10, 3 );

		// Content filtering
		add_filter( 'learndash_content', array( $this, 'content_filter' ), 10, 2 );
		add_filter( 'learndash_can_user_read_step', array( $this, 'can_user_read_step' ), 10, 3 );

		// Settings
		add_action( 'add_meta_boxes', array( $this, 'configure_meta_box' ) );
		add_action( 'wpf_meta_box_content', array( $this, 'meta_box_notice' ), 5, 2 );
		add_action( 'wpf_meta_box_content', array( $this, 'meta_box_content' ), 40, 2 );

		add_filter( 'learndash_settings_fields', array( $this, 'course_settings_fields' ), 10, 2 );

		// Assignment settings
		add_filter( 'learndash_settings_fields', array( $this, 'lesson_settings_fields' ), 10, 2 );

		// WPF stuff
		add_filter( 'wpf_meta_field_groups', array( $this, 'add_meta_field_group' ), 15 );
		add_filter( 'wpf_meta_fields', array( $this, 'prepare_meta_fields' ) );
		add_filter( 'wpf_watched_meta_fields', array( $this, 'watch_meta_fields' ) );
		add_filter( 'wpf_apply_tags_on_view', array( $this, 'maybe_stop_apply_tags_on_view' ), 10, 2 );
		add_filter( 'wpf_post_access_meta', array( $this, 'inherit_permissions_from_course' ), 10, 2 );

		// Meta boxes
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ), 20, 2 );
		add_action( 'save_post', array( $this, 'save_meta_box_data' ), 20 );
		add_action( 'wpf_meta_box_save', array( $this, 'meta_box_save' ), 20, 2 );

		// Admin course table
		add_filter( 'display_post_states', array( $this, 'admin_table_post_states' ), 10, 2 );

		// Auto enrollments
		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 9, 2 ); // This is 9 so that the user is in the correct groups by the time we go to update their courses
		add_action( 'wpf_tags_modified', array( $this, 'update_course_access' ), 10, 2 );

		// Group linking
		add_filter( 'learndash_settings_fields', array( $this, 'group_settings_fields' ), 10, 2 );
		add_action( 'ld_added_group_access', array( $this, 'added_group_access' ), 10, 2 );
		add_action( 'ld_removed_group_access', array( $this, 'removed_group_access' ), 10, 2 );

		// Group Leader linking
		add_action( 'ld_added_leader_group_access', array( $this, 'added_group_leader_access' ), 10, 2 );
		add_action( 'ld_removed_leader_group_access', array( $this, 'removed_group_leader_access' ), 10, 2 );

		// Course linking
		add_action( 'learndash_update_course_access', array( $this, 'updated_course_access' ), 10, 4 );

		// Send auto-generated passwords on user registration
		add_filter( 'random_password', array( $this, 'push_password' ) );

		// Export functions
		add_filter( 'wpf_export_options', array( $this, 'export_options' ) );
		add_filter( 'wpf_batch_learndash_courses_init', array( $this, 'batch_init' ) );
		add_action( 'wpf_batch_learndash_courses', array( $this, 'batch_step' ) );

	}

	/**
	 * Applies tags when a LearnDash course is completed
	 *
	 * @access public
	 * @return void
	 */

	public function course_completed( $data ) {

		$settings = get_post_meta( $data['course']->ID, 'wpf-settings', true );

		if ( ! empty( $settings['apply_tags_ld'] ) ) {
			wp_fusion()->user->apply_tags( $settings['apply_tags_ld'], $data['user']->ID );
		}

		update_user_meta( $data['user']->ID, 'ld_last_course_completed', get_the_title( $data['course']->ID ) );
		update_user_meta( $data['user']->ID, 'ld_last_course_completed_date', current_time( 'timestamp' ) );

	}

	/**
	 * Applies tags when a LearnDash lesson is completed
	 *
	 * @access public
	 * @return void
	 */

	public function lesson_completed( $data ) {

		$settings = get_post_meta( $data['lesson']->ID, 'wpf-settings', true );

		if ( ! empty( $settings['apply_tags_ld'] ) ) {
			wp_fusion()->user->apply_tags( $settings['apply_tags_ld'], $data['user']->ID );
		}

		update_user_meta( $data['user']->ID, 'ld_last_lesson_completed', get_the_title( $data['lesson']->ID ) );
		update_user_meta( $data['user']->ID, 'ld_last_lesson_completed_date', current_time( 'timestamp' ) );

	}

	/**
	 * Applies tags when a LearnDash quiz is completed
	 *
	 * @access public
	 * @return void
	 */

	public function quiz_completed( $data, $user ) {

		if ( isset( $data['quiz']->ID ) ) {
			$quiz_id = $data['quiz']->ID;
		} else {
			// For grading in the admin
			$quiz_id = $data['quiz'];
		}

		$settings = get_post_meta( $quiz_id, 'wpf-settings', true );

		if ( $data['pass'] == true && ! empty( $settings['apply_tags_ld'] ) ) {

			wp_fusion()->user->apply_tags( $settings['apply_tags_ld'], $user->ID );

		} elseif ( $data['pass'] == false && ! empty( $settings['apply_tags_ld_quiz_fail'] ) ) {

			wp_fusion()->user->apply_tags( $settings['apply_tags_ld_quiz_fail'], $user->ID );

		}

	}


	/**
	 * Applies tags when a LearnDash topic is completed
	 *
	 * @access public
	 * @return void
	 */

	public function topic_completed( $data ) {

		$settings = get_post_meta( $data['topic']->ID, 'wpf-settings', true );

		if ( ! empty( $settings['apply_tags_ld'] ) ) {
			wp_fusion()->user->apply_tags( $settings['apply_tags_ld'], $data['user']->ID );
		}

	}

	/**
	 * Applies tags when a LearnDash essay is submitted
	 *
	 * @access public
	 * @return void
	 */

	public function essay_submitted( $essay_id, $essay_args ) {

		$quid_pro_id = get_post_meta( $essay_id, 'quiz_id', true );

		$args = array(
			'post_type'  => 'sfwd-quiz',
			'fields'     => 'ids',
			'meta_key'   => 'quiz_pro_id',
			'meta_value' => $quid_pro_id,
		);

		$quizzes = get_posts( $args );

		if ( empty( $quizzes ) ) {
			return;
		}

		$settings = get_post_meta( $quizzes[0], 'wpf-settings', true );

		if ( ! empty( $settings['apply_tags_ld_essay_submitted'] ) ) {

			wp_fusion()->user->apply_tags( $settings['apply_tags_ld_essay_submitted'], $essay_args['post_author'] );

		}

	}

	/**
	 * Sync quiz question answers to custom fields when quiz answered
	 *
	 * @access public
	 * @return void
	 */

	public function quiz_answered( $results, $quiz, $question_models ) {

		$contact_id = wp_fusion()->user->get_contact_id();

		if ( false === $contact_id ) {
			return;
		}

		$questions_and_answers = array();

		foreach ( $results as $key => $result ) {

			if ( ! empty( $result['e']['r'] ) ) {

				$questions_and_answers[ $key ] = $result['e']['r'];

			} else {

				// Essay questions
				$questions_and_answers[ $key ] = $_POST['data']['responses'][ $key ]['response'];

			}
		}

		// Map the question IDs into post IDs
		foreach ( $question_models as $post_id => $model ) {

			$answerData = $model->getAnswerData();

			foreach ( $questions_and_answers as $key => $result ) {

				if ( $key == $model->getId() ) {

					// Convert multiple choice from true / false into the selected option
					if ( is_array( $result ) ) {

						foreach ( $result as $n => $multiple_choice_answer ) {

							if ( true == $multiple_choice_answer ) {

								$answers = $model->getAnswerData();

								foreach ( $answers as $x => $answer ) {

									if ( $x == $n ) {

										$result = $answer->getAnswer();
										break 2;

									}
								}
							}
						}
					}

					$questions_and_answers[ $post_id ] = $result;
					unset( $questions_and_answers[ $key ] );
				}
			}
		}

		$update_data = array();

		foreach ( $questions_and_answers as $post_id => $answer ) {

			$settings = get_post_meta( $post_id, 'wpf-settings-learndash', true );

			if ( ! empty( $settings ) && ! empty( $settings['crm_field'] ) ) {

				$update_data[ $settings['crm_field'] ] = $answer;

			}
		}

		if ( ! empty( $update_data ) ) {

			wpf_log( 'info', wpf_get_current_user_id(), 'Syncing <a href="' . get_edit_post_link( $quiz->getPostId() ) . '">' . $quiz->getName() . '</a> quiz answers to ' . wp_fusion()->crm->name . ':', array( 'meta_array_nofilter' => $update_data ) );

			wp_fusion()->crm->update_contact( $contact_id, $update_data, false );

		}

	}

	/**
	 * Apply tags when an assignment has been uploaded
	 *
	 * @access public
	 * @return void
	 */

	public function assignment_uploaded( $assignment_post_id, $assignment_meta ) {

		$settings = get_post_meta( $assignment_meta['lesson_id'], 'wpf-settings-learndash', true );

		if ( ! empty( $settings ) && ! empty( $settings['apply_tags_assignment_upload'] ) ) {

			wp_fusion()->user->apply_tags( $settings['apply_tags_assignment_upload'], $assignment_meta['user_id'] );

		}

	}

	/**
	 * Sync the last course progressed
	 *
	 * @access public
	 * @return void
	 */

	public function update_user_activity( $args ) {

		if ( ! empty( $args['course_id'] ) ) {

			remove_action( 'learndash_update_user_activity', array( $this, 'update_user_activity' ), 10, 1 );

			update_user_meta( $args['user_id'], 'ld_last_course_progressed', get_the_title( $args['course_id'] ) );

		}

	}

	/**
	 * Hide LD content if user doesn't have access
	 *
	 * @access public
	 * @return mixed Content
	 */

	public function content_filter( $content, $post ) {

		if ( wp_fusion()->access->user_can_access( $post->ID ) != true ) {
			$content = wp_fusion()->access->get_restricted_content_message();
		}

		return $content;

	}

	/**
	 * If query filtering is enabled, hide course steps from the course
	 * navigation.
	 *
	 * @since  3.36.16
	 *
	 * @param  bool  $can_read  Can the user read the step?
	 * @param  int   $step_id   The step ID.
	 * @param  int   $course_id The course ID.
	 * @return bool  True if able to user read step, False otherwise.
	 */
	public function can_user_read_step( $can_read, $step_id, $course_id ) {

		if ( ! $can_read ) {
			return $can_read;
		}

		if ( false !== wp_fusion()->settings->get( 'hide_archives' ) ) {

			// If query filtering is on

			$post_types = wp_fusion()->settings->get( 'query_filter_post_types', array() );

			if ( empty( $post_types ) || in_array( get_post_type( $step_id ), $post_types ) ) {

				if ( ! wpf_user_can_access( $step_id ) ) {
					$can_read = false;
				}
			}
		}

		if ( $can_read ) {

			// If Filter Course Steps is on

			$settings = get_post_meta( $course_id, 'wpf-settings-learndash', true );

			if ( ! empty( $settings ) && ! empty( $settings['filter_steps'] ) ) {
				if ( ! wpf_user_can_access( $step_id ) ) {
					$can_read = false;
				}
			}
		}

		return $can_read;

	}

	/**
	 * Remove standard "Apply to children" field from meta box
	 *
	 * @access public
	 * @return void
	 */

	public function configure_meta_box() {

		global $post;

		if ( empty( $post ) ) {
			return;
		}

		if ( $post->post_type == 'sfwd-courses' || $post->post_type == 'sfwd-lessons' || $post->post_type == 'sfwd-topic' ) {
			remove_action( 'wpf_meta_box_content', 'apply_to_children', 35 );
		}

	}

	/**
	 * Adds notice about inherited rules
	 *
	 * @access public
	 * @return void
	 */

	public function meta_box_notice( $post, $settings ) {

		if ( 'sfwd-lessons' != $post->post_type && 'sfwd-topic' != $post->post_type && 'sfwd-quiz' != $post->post_type ) {
			return;
		}

		$parent_settings = false;

		//@todo release this

		$lesson_id = learndash_get_lesson_id( $post->ID );

		if ( ! empty( $lesson_id ) ) {
			$parent_settings = get_post_meta( $lesson_id, 'wpf-settings', true );
		}

		if ( empty( $parent_settings ) || empty( $parent_settings['lock_content'] ) ) {

			// Maybe try the course

			$course_id       = learndash_get_course_id( $post->ID );
			$parent_settings = get_post_meta( $course_id, 'wpf-settings', true );

		}

		if ( ! empty( $parent_settings ) && ! empty( $parent_settings['lock_content'] ) ) {

			$post_type_object = get_post_type_object( $post->post_type );

			echo '<div class="wpf-metabox-notice">';

			if ( isset( $course_id ) ) {
				printf( __( 'If no access rules are specified here, this %1$s will inherit permissions from the course %2$s.', 'wp-fusion' ), strtolower( $post_type_object->labels->singular_name ), '<a href="' . get_edit_post_link( $course_id ) . '">' . get_the_title( $course_id ) . '</a>' );
			} else {
				printf( __( 'If no access rules are specified here, this %1$s will inherit permissions from the lesson %2$s.', 'wp-fusion' ), strtolower( $post_type_object->labels->singular_name ), '<a href="' . get_edit_post_link( $lesson_id ) . '">' . get_the_title( $lesson_id ) . '</a>' );
			}

			$required_tags = array();

			if ( ! empty( $parent_settings['allow_tags'] ) ) {
				$required_tags = array_merge( $required_tags, $parent_settings['allow_tags'] );
			}

			if ( ! empty( $parent_settings['allow_tags_all'] ) ) {
				$required_tags = array_merge( $required_tags, $parent_settings['allow_tags_all'] );
			}

			if ( ! empty( $required_tags ) ) {

				$required_tags = array_map( array( wp_fusion()->user, 'get_tag_label' ), $required_tags );

				echo '<span class="notice-required-tags">' . sprintf( __( '(Required tag(s): %s)', 'wp-fusion' ), implode( ', ', $required_tags ) ) . '</span>';
			}

			echo '</div>';

		}

	}


	/**
	 * Adds LearnDash fields to WPF meta box
	 *
	 * @access public
	 * @return void
	 */

	public function meta_box_content( $post, $settings ) {

		if ( $post->post_type != 'sfwd-courses' && $post->post_type != 'sfwd-lessons' && $post->post_type != 'sfwd-topic' && $post->post_type != 'sfwd-quiz' ) {
			return;
		}

		$defaults = array(
			'apply_tags_ld'                 => array(),
			'apply_tags_ld_essay_submitted' => array(),
			'apply_tags_ld_quiz_fail'       => array(),
		);

		$settings = array_merge( $defaults, $settings );

		$settings['apply_children_lessons'] = false;

		echo '<p><label for="wpf-apply-tags-ld"><small>' . __( 'Apply these tags when marked complete' ) . ':</small></label>';

		wpf_render_tag_multiselect(
			array(
				'setting'   => $settings['apply_tags_ld'],
				'meta_name' => 'wpf-settings',
				'field_id'  => 'apply_tags_ld',
			)
		);

		echo '</p>';

		if ( $post->post_type == 'sfwd-lessons' ) {

			$children = get_posts(
				array(
					'posts_per_page' => - 1,
					'post_type'      => array( 'sfwd-topic' ),
					'meta_key'       => 'lesson_id',
					'meta_value'     => $post->ID,
				)
			);

			if ( count( $children ) > 0 ) {
				echo '<p><input class="checkbox" type="checkbox" id="wpf-apply-children-lessons" name="wpf-settings[apply_children_lessons]" value="1" ' . checked( $settings['apply_children_lessons'], 1, false ) . ' />';
				echo '<small>' . sprintf( __( 'Copy to %d related topics', 'wp-fusion' ), count( $children ) ) . '</small>';
				echo '</p>';
			}
		}

		if ( $post->post_type == 'sfwd-quiz' ) {

			echo '<p><label for="wpf-apply-tags-ld-quiz-fail"><small>' . __( 'Apply these tags when essay submitted', 'wp-fusion' ) . ':</small></label>';

			wpf_render_tag_multiselect(
				array(
					'setting'   => $settings['apply_tags_ld_essay_submitted'],
					'meta_name' => 'wpf-settings',
					'field_id'  => 'apply_tags_ld_essay_submitted',
				)
			);

			echo '</p>';

			echo '<p><label for="wpf-apply-tags-ld-quiz-fail"><small>' . __( 'Apply these tags when quiz failed', 'wp-fusion' ) . ':</small></label>';

			wpf_render_tag_multiselect(
				array(
					'setting'   => $settings['apply_tags_ld_quiz_fail'],
					'meta_name' => 'wpf-settings',
					'field_id'  => 'apply_tags_ld_quiz_fail',
				)
			);

			echo '</p>';

		}

	}

	/**
	 * Runs when WPF meta box is saved
	 *
	 * @access public
	 * @return void
	 */

	public function meta_box_save( $post_id, $data ) {

		if ( isset( $data['apply_children_lessons'] ) ) {

			$children = get_posts(
				array(
					'posts_per_page' => - 1,
					'post_type'      => array( 'sfwd-topic' ),
					'meta_key'       => 'lesson_id',
					'meta_value'     => $post_id,
				)
			);

		}

		if ( isset( $children ) ) {

			unset( $data['apply_tags'] );
			unset( $data['apply_tags_ld'] );
			unset( $data['apply_children_courses'] );
			unset( $data['apply_children_lessons'] );

			foreach ( $children as $child ) {
				update_post_meta( $child->ID, 'wpf-settings', $data );
			}
		}

	}

	/**
	 * Adds meta boxes
	 *
	 * @access public
	 * @return mixed
	 */

	public function add_meta_box( $post_id, $data ) {

		$admin_permissions = wp_fusion()->settings->get( 'admin_permissions' );

		if ( true == $admin_permissions && ! current_user_can( 'manage_options' ) ) {
			return;
		}

		add_meta_box( 'wpf-learndash-meta', __( 'WP Fusion - Course Settings', 'wp-fusion' ), array( $this, 'meta_box_callback' ), 'sfwd-courses' );
		add_meta_box( 'wpf-learndash-meta', __( 'WP Fusion - Group Settings', 'wp-fusion' ), array( $this, 'meta_box_callback_groups' ), 'groups' );
		add_meta_box( 'wpf-learndash-meta', __( 'WP Fusion - Question Settings', 'wp-fusion' ), array( $this, 'meta_box_callback_question' ), 'sfwd-question' );

	}

	/**
	 * Course meta box callback
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback( $post ) {

		echo '<p><span class="description">' . __( 'These options have been moved to the course\'s Settings panel.', 'wp-fusion' ) . '</span></p>';

	}

	/**
	 * Displays meta box content (groups)
	 *
	 * @access public
	 * @return mixed
	 */

	public function meta_box_callback_groups( $post ) {

		echo '<p><span class="description">' . __( 'These options have been moved to the Group\'s Settings panel.', 'wp-fusion' ) . '</span></p>';

	}

	/**
	 * Displays meta box content (question)
	 *
	 * @access public
	 * @return mixed HTML Output
	 */

	public function meta_box_callback_question( $post ) {

		wp_nonce_field( 'wpf_meta_box_learndash', 'wpf_meta_box_learndash_nonce' );

		$settings = array(
			'crm_field' => array(),
		);

		if ( get_post_meta( $post->ID, 'wpf-settings-learndash', true ) ) {
			$settings = array_merge( $settings, get_post_meta( $post->ID, 'wpf-settings-learndash', true ) );
		}

		echo '<table class="form-table"><tbody>';

		echo '<tr>';

		echo '<th scope="row"><label for="tag_link">' . __( 'Sync to field', 'wp-fusion' ) . ':</label></th>';
		echo '<td>';

		wpf_render_crm_field_select( $settings['crm_field'], 'wpf-settings-learndash' );

		echo '<span class="description">' . sprintf( __( 'Sync answers to this question the selected custom field in %s.', 'wp-fusion' ), wp_fusion()->crm->name ) . '</span>';
		echo '</td>';

		echo '</tr>';

		echo '</tbody></table>';

	}


	/**
	 * Registers LD course fields
	 *
	 * @access public
	 * @return array Fields
	 */

	public function course_settings_fields( $fields, $metabox_key ) {

		if ( 'learndash-course-access-settings' == $metabox_key ) {

			$admin_permissions = wp_fusion()->settings->get( 'admin_permissions' );

			if ( true == $admin_permissions && ! current_user_can( 'manage_options' ) ) {
				return $fields;
			}

			$settings = array(
				'apply_tags_enrolled' => array(),
				'tag_link'            => array(),
				'filter_steps'        => false,
			);

			global $post;

			if ( is_object( $post ) ) {
				$settings = wp_parse_args( get_post_meta( $post->ID, 'wpf-settings-learndash', true ), $settings );
			}

			$new_options = array(
				'apply_tags_enrolled' => array(
					'name'             => 'apply_tags_enrolled',
					'label'            => __( 'Apply Tags - Enrolled', 'wp-fusion' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'desc'             => sprintf( __( 'These tags will be applied in %s when someone is enrolled in this course.', 'wp-fusion' ), wp_fusion()->crm->name ),
					'help_text'        => sprintf( __( 'For more information on these settings, %1$ssee our documentation%2$s.', 'wp-fusion' ), '<a href="https://wpfusion.com/documentation/learning-management/learndash/#course-specific-settings" target="_blank">', '</a>' ),
				),
				'tag_link'            => array(
					'name'             => 'tag_link',
					'label'            => __( 'Link with Tag', 'wp-fusion' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'desc'             => sprintf( __( 'This tag will be applied in %1$s when a user is enrolled, and will be removed when a user is unenrolled. Likewise, if this tag is applied to a user from within %2$s, they will be automatically enrolled in this course. If this tag is removed, the user will be removed from the course.', 'wp-fusion' ), wp_fusion()->crm->name, wp_fusion()->crm->name ),
					'limit'            => 1,
					'help_text'        => sprintf( __( 'For more information on these settings, %1$ssee our documentation%2$s.', 'wp-fusion' ), '<a href="https://wpfusion.com/documentation/learning-management/learndash/#course-specific-settings" target="_blank">', '</a>' ),
				),
			);

			if ( version_compare( LEARNDASH_VERSION, '3.4.0', '>=' ) ) {

				$new_options['filter_steps'] = array(
					'name'      => 'wpf-settings-learndash[filter_steps]',
					'name_wrap' => false,
					'label'     => __( 'Filter Course Steps', 'wp-fusion' ),
					'type'      => 'checkbox-switch',
					'default'   => '',
					'options'   => array(
						'on' => '',
					),
					'value'     => $settings['filter_steps'],
					'help_text' => __( 'When this setting is enabled, lessons, topics, and quizzes that a user doesn\'t have access to will be removed from the course navigation.', 'wp-fusion' ),
				);

			}

			// Warning if course is open and a linked tag is set

			if ( is_object( $post ) ) {

				if ( ! empty( $settings['tag_link'] ) ) {

					$course_settings = get_post_meta( $post->ID, '_sfwd-courses', true );

					if ( ! empty( $course_settings ) && isset( $course_settings['sfwd-courses_course_price_type'] ) ) {

						if ( 'free' == $course_settings['sfwd-courses_course_price_type'] || 'open' == $course_settings['sfwd-courses_course_price_type'] ) {

							$new_options['tag_link']['desc'] .= '<br /><br/><div class="ld-settings-info-banner ld-settings-info-banner-alert"><p>' . sprintf( __( '<strong>Note:</strong> Your course Access Mode is currently set to <strong>%s</strong>, for auto-enrollments to work correctly your course Access Mode should be set to "closed".', 'wp-fusion' ), $course_settings['sfwd-courses_course_price_type'] ) . '</p></div>';

						}
					}
				}
			}

			$fields = wp_fusion()->settings->insert_setting_after( 'course_access_list', $fields, $new_options );

		}

		return $fields;

	}



	/**
	 * Registers LD group fields
	 *
	 * @access public
	 * @return array Fields
	 */

	public function group_settings_fields( $fields, $metabox_key ) {

		if ( 'learndash-group-access-settings' == $metabox_key ) {

			$admin_permissions = wp_fusion()->settings->get( 'admin_permissions' );

			if ( true == $admin_permissions && ! current_user_can( 'manage_options' ) ) {
				return $fields;
			}

			$new_options = array(
				'apply_tags_enrolled' => array(
					'name'             => 'apply_tags_enrolled',
					'label'            => __( 'Apply Tags - Enrolled', 'wp-fusion' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'desc'             => sprintf( __( 'These tags will be applied in %s when someone is enrolled in this group.', 'wp-fusion' ), wp_fusion()->crm->name ),
					'help_text'        => sprintf( __( 'For more information on these settings, %1$ssee our documentation%2$s.', 'wp-fusion' ), '<a href="https://wpfusion.com/documentation/learning-management/learndash/#groups" target="_blank">', '</a>' ),
				),
				'tag_link'            => array(
					'name'             => 'tag_link',
					'label'            => __( 'Link with Tag', 'wp-fusion' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'desc'             => sprintf( __( 'This tag will be applied in %1$s when a user is enrolled, and will be removed when a user is unenrolled. Likewise, if this tag is applied to a user from within %2$s, they will be automatically enrolled in this group. If this tag is removed, the user will be removed from the group.', 'wp-fusion' ), wp_fusion()->crm->name, wp_fusion()->crm->name ),
					'limit'            => 1,
					'help_text'        => sprintf( __( 'For more information on these settings, %1$ssee our documentation%2$s.', 'wp-fusion' ), '<a href="https://wpfusion.com/documentation/learning-management/learndash/#groups" target="_blank">', '</a>' ),
				),
				'leader_tag'          => array(
					'name'             => 'leader_tag',
					'label'            => __( 'Link with Tag - Group Leader', 'wp-fusion' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'desc'             => sprintf( __( 'This tag will be applied in %1$s when a group leader is assigned, and will be removed when a group leader is removed. Likewise, if this tag is applied to a user from within %2$s, they will be automatically assigned as the leader of this group. If this tag is removed, the user will be removed from leadership of the group.', 'wp-fusion' ), wp_fusion()->crm->name, wp_fusion()->crm->name ),
					'limit'            => 1,
					'help_text'        => sprintf( __( 'For more information on these settings, %1$ssee our documentation%2$s.', 'wp-fusion' ), '<a href="https://wpfusion.com/documentation/learning-management/learndash/#groups" target="_blank">', '</a>' ),
				),
			);

			$fields = $fields + $new_options;

		}

		return $fields;

	}


	/**
	 * Adds WPF settings to assignment upload section in lesson settings
	 *
	 * @access public
	 * @return array Options Fields
	 */

	public function lesson_settings_fields( $options_fields, $metabox_key ) {

		if ( 'learndash-lesson-display-content-settings' == $metabox_key || 'learndash-topic-display-content-settings' == $metabox_key ) {

			$new_options = array(
				'apply_tags_assignment_upload' => array(
					'name'             => 'apply_tags_assignment_upload',
					'label'            => esc_html__( 'Apply Tags', 'learndash' ),
					'type'             => 'multiselect',
					'multiple'         => 'true',
					'display_callback' => array( $this, 'display_wpf_tags_select' ),
					'parent_setting'   => 'lesson_assignment_upload',
					'desc'             => sprintf( __( 'Select tags to be applied to the student in %s when an assigment is uploaded.', 'wp-fusion' ), wp_fusion()->crm->name ),
				),
			);

			$options_fields = wp_fusion()->settings->insert_setting_after( 'assignment_upload_limit_size', $options_fields, $new_options );

		}

		return $options_fields;

	}



	/**
	 * Show post access controls in the posts table
	 *
	 * @access public
	 * @return array Post States
	 */

	public function admin_table_post_states( $post_states, $post ) {

		if ( 'sfwd-courses' != $post->post_type && 'groups' != $post->post_type ) {
			return $post_states;
		}

		$wpf_settings = get_post_meta( $post->ID, 'wpf-settings-learndash', true );

		if ( ! empty( $wpf_settings ) && ! empty( $wpf_settings['tag_link'] ) ) {

			$post_type_object = get_post_type_object( $post->post_type );

			$content = sprintf( __( 'This %1$s is linked for auto-enrollment with %2$s tag: ', 'wp-fusion' ), strtolower( $post_type_object->labels->singular_name ), wp_fusion()->crm->name );

			$content .= '<strong>' . wpf_get_tag_label( $wpf_settings['tag_link'][0] ) . '</strong>';

			$post_states['wpf_learndash'] = '<span class="dashicons dashicons-admin-links wpf-tip wpf-tip-bottom" data-tip="' . $content . '"></span>';

		}

		return $post_states;

	}

	/**
	 * Display tags select input for assignment upload setting
	 *
	 * @access public
	 * @return mixed HTML output
	 */

	public function display_wpf_tags_select( $field_args ) {

		global $post;

		$settings = get_post_meta( $post->ID, 'wpf-settings-learndash', true );

		if ( empty( $settings ) ) {
			$settings = array();
		}

		if ( ! isset( $settings[ $field_args['name'] ] ) ) {
			$settings[ $field_args['name'] ] = array();
		}

		$args = array(
			'setting'   => $settings[ $field_args['name'] ],
			'meta_name' => 'wpf-settings-learndash',
			'field_id'  => $field_args['name'],
		);

		if ( isset( $field_args['limit'] ) ) {
			$args['limit'] = $field_args['limit'];
		}

		wpf_render_tag_multiselect( $args );

		echo '<p style="margin-top:5px;" class="description">' . $field_args['desc'] . '</p>';

	}

	/**
	 * Runs when WPF meta box is saved on a course, lesson, or question
	 *
	 * @access public
	 * @return void
	 */

	public function save_meta_box_data( $post_id ) {

		if ( empty( $_POST['post_type'] ) || ! in_array( $_POST['post_type'], array( 'sfwd-courses', 'groups', 'sfwd-question', 'sfwd-topic' ) ) ) {
			return;
		}

		// As of LD 3.2.2 this runs on every lesson in the builder when the course is saved, so we'll check for that here to avoid having the lesson settings overwritten by the course
		if ( $_POST['post_ID'] != $post_id ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( isset( $_POST['wpf-settings-learndash'] ) ) {
			update_post_meta( $post_id, 'wpf-settings-learndash', $_POST['wpf-settings-learndash'] );
		} else {
			delete_post_meta( $post_id, 'wpf-settings-learndash' );
		}

	}


	/**
	 * Update user course enrollment when tags are modified
	 *
	 * @access public
	 * @return void
	 */

	public function update_course_access( $user_id, $user_tags ) {

		$linked_courses = get_posts(
			array(
				'post_type'  => 'sfwd-courses',
				'nopaging'   => true,
				'meta_query' => array(
					array(
						'key'     => 'wpf-settings-learndash',
						'compare' => 'EXISTS',
					),
				),
				'fields'     => 'ids',
			)
		);

		// Update course access based on user tags
		if ( ! empty( $linked_courses ) ) {

			$user_tags = wp_fusion()->user->get_tags( $user_id ); // Get them here for cases where the tags might have changed since wpf_tags_modified was triggered

			// See if user is enrolled
			$enrolled_courses = learndash_user_get_enrolled_courses( $user_id, array() );

			// We won't look at courses a user is in because of a group
			$groups_courses = learndash_get_user_groups_courses_ids( $user_id );

			// Don't bother with open courses since users are enrolled in them by default
			$open_courses = learndash_get_open_courses();

			$enrolled_courses = array_diff( $enrolled_courses, $open_courses );

			foreach ( $linked_courses as $course_id ) {

				$settings = get_post_meta( $course_id, 'wpf-settings-learndash', true );

				if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
					continue;
				}

				$tag_id = $settings['tag_link'][0];

				if ( in_array( $course_id, $enrolled_courses ) ) {
					$is_enrolled = true;
				} else {
					$is_enrolled = false;
				}

				// Prevent looping
				remove_action( 'learndash_update_course_access', array( $this, 'updated_course_access' ), 10, 4 );

				if ( in_array( $tag_id, $user_tags ) && ! $is_enrolled && ! user_can( $user_id, 'manage_options' ) ) {

					if ( in_array( $course_id, $groups_courses ) ) {

						// We can't add someone to a course that they already have access to as part of a group

						wpf_log( 'notice', $user_id, 'User could not be auto-enrolled in LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong> because they already have access to that course as part of a LearnDash group.', array( 'source' => 'learndash' ) );
						continue;

					}

					// Logger
					wpf_log( 'info', $user_id, 'User auto-enrolled in LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>', array( 'source' => 'learndash' ) );

					ld_update_course_access( $user_id, $course_id, $remove = false );

				} elseif ( ! in_array( $tag_id, $user_tags ) && $is_enrolled && ! user_can( $user_id, 'manage_options' ) ) {

					if ( in_array( $course_id, $groups_courses ) ) {

						// We can't add someone to a course that they already have access to as part of a group

						wpf_log( 'notice', $user_id, 'User could not be un-enrolled from LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong> because they have access to that course as part a LearnDash group.', array( 'source' => 'learndash' ) );
						continue;

					}

					// Logger
					wpf_log( 'info', $user_id, 'User un-enrolled from LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>', array( 'source' => 'learndash' ) );

					ld_update_course_access( $user_id, $course_id, $remove = true );

				}

				add_action( 'learndash_update_course_access', array( $this, 'updated_course_access' ), 10, 4 );

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

		// Possibly update groups
		$linked_groups = get_posts(
			array(
				'post_type'  => 'groups',
				'nopaging'   => true,
				'meta_query' => array(
					array(
						'key'     => 'wpf-settings-learndash',
						'compare' => 'EXISTS',
					),
				),
				'fields'     => 'ids',
			)
		);

		$updated = false;

		if ( ! empty( $linked_groups ) ) {

			// Prevent looping
			remove_action( 'ld_added_group_access', array( $this, 'added_group_access' ), 10, 2 );
			remove_action( 'ld_removed_group_access', array( $this, 'removed_group_access' ), 10, 2 );

			remove_action( 'ld_added_leader_group_access', array( $this, 'added_group_leader_access' ), 10, 2 );
			remove_action( 'ld_removed_leader_group_access', array( $this, 'removed_group_leader_access' ), 10, 2 );

			$user_tags = wp_fusion()->user->get_tags( $user_id ); // Get them here for cases where the tags might have changed since wpf_tags_modified was triggered

			foreach ( $linked_groups as $group_id ) {

				$settings = get_post_meta( $group_id, 'wpf-settings-learndash', true );

				if ( empty( $settings ) ) {
					continue;
				}

				if ( ! empty( $settings['tag_link'] ) ) {

					// Group member auto-enrollment

					$tag_id = $settings['tag_link'][0];

					if ( in_array( $tag_id, $user_tags ) && learndash_is_user_in_group( $user_id, $group_id ) == false ) {

						wpf_log( 'info', $user_id, 'User added to LearnDash group <a href="' . get_edit_post_link( $group_id ) . '" target="_blank">' . get_the_title( $group_id ) . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

						ld_update_group_access( $user_id, $group_id, $remove = false );

						$updated = true;

					} elseif ( ! in_array( $tag_id, $user_tags ) && learndash_is_user_in_group( $user_id, $group_id ) != false ) {

						wpf_log( 'info', $user_id, 'User removed from LearnDash group <a href="' . get_edit_post_link( $group_id ) . '" target="_blank">' . get_the_title( $group_id ) . '</a> by tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

						ld_update_group_access( $user_id, $group_id, $remove = true );

						$updated = true;

					}
				}

				if ( ! empty( $settings['leader_tag'] ) ) {

					// Group leader auto-enrollment

					$tag_id = $settings['leader_tag'][0];

					// Get list of group leader IDs - so we can check later if the user is a leader in the group
					// and we need to remove the user from the leader of that group accordingly.

					$group_leader_ids = learndash_get_groups_administrator_ids( $group_id, $bypass_transient = true );

					if ( in_array( $tag_id, $user_tags ) && ! in_array( $user_id, $group_leader_ids ) ) {

						wpf_log( 'info', $user_id, 'User added as leader to LearnDash group <a href="' . get_edit_post_link( $group_id ) . '" target="_blank">' . get_the_title( $group_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

						ld_update_leader_group_access( $user_id, $group_id, $remove = false );

					} elseif ( ! in_array( $tag_id, $user_tags ) && in_array( $user_id, $group_leader_ids ) ) {

						wpf_log( 'info', $user_id, 'User removed as leader from LearnDash group <a href="' . get_edit_post_link( $group_id ) . '" target="_blank">' . get_the_title( $group_id ) . '</a> by linked tag <strong>' . wp_fusion()->user->get_tag_label( $tag_id ) . '</strong>' );

						ld_update_leader_group_access( $user_id, $group_id, $remove = true );

					}
				}
			}

			add_action( 'ld_added_group_access', array( $this, 'added_group_access' ), 10, 2 );
			add_action( 'ld_removed_group_access', array( $this, 'removed_group_access' ), 10, 2 );

			add_action( 'ld_added_leader_group_access', array( $this, 'added_group_leader_access' ), 10, 2 );
			add_action( 'ld_removed_leader_group_access', array( $this, 'removed_group_leader_access' ), 10, 2 );

		}

		// Clear the courses / groups transients

		if ( $updated ) {

			delete_transient( 'learndash_user_courses_' . $user_id );
			delete_transient( 'learndash_user_groups_' . $user_id );

		}

	}

	/**
	 * Don't apply tags on view when a LD-restricted lesson is viewed
	 *
	 * @access public
	 * @return bool Proceed
	 */

	public function maybe_stop_apply_tags_on_view( $proceed, $post_id ) {

		if ( get_post_type( $post_id ) == 'sfwd-lessons' ) {

			$access_from = ld_lesson_access_from( $post_id, wpf_get_current_user_id() );

			if ( $access_from > time() ) {
				$proceed = false;
			}
		}

		return $proceed;

	}

	/**
	 * LearnDash lessons and topics should inherit permissions from the parent course
	 *
	 * @access public
	 * @return array Access Meta
	 */

	public function inherit_permissions_from_course( $access_meta, $post_id ) {

		if ( empty( $access_meta ) || empty( $access_meta['lock_content'] ) ) {

			$post_type = get_post_type( $post_id );

			if ( 'sfwd-lessons' == $post_type || 'sfwd-topic' == $post_type || 'sfwd-quiz' == $post_type ) {

				$parent_settings = false;

				// Inherit the settings from the parent lesson

				// @todo release this

				$lesson_id = learndash_get_lesson_id( $post_id );

				if ( ! empty( $lesson_id ) ) {
					$parent_settings = get_post_meta( $lesson_id, 'wpf-settings', true );
				}

				if ( empty( $parent_settings ) || empty( $parent_settings['lock_content'] ) ) {

					// Maybe try the course

					$course_id       = learndash_get_course_id( $post_id );
					$parent_settings = get_post_meta( $course_id, 'wpf-settings', true );

				}

				if ( ! empty( $parent_settings ) ) {
					$access_meta = $parent_settings;
				}
			}
		}

		return $access_meta;

	}

	/**
	 * Runs after a new user is inserted by ThriveCart, syncs the generated
	 * password to the CRM.
	 *
	 * @since 3.36.8
	 *
	 * @param ID          $user_id  The new user ID.
	 * @param array       $customer The ThriveCart customer data.
	 * @param string|bool $password The generated password.
	 */
	public function thrivecart_after_create_user( $user_id, $customer, $password = false ) {

		if ( false !== $password ) {

			$password_field = wp_fusion()->settings->get( 'return_password_field', array() );

			if ( wp_fusion()->settings->get( 'return_password' ) == true && ! empty( $password_field['crm_field'] ) ) {

				wpf_log( 'info', $user_id, 'Syncing LearnDash-generated password <strong>' . $password . '</strong>' );

				$update_data = array(
					$password_field['crm_field'] => $password,
				);

				$contact_id = wpf_get_contact_id( $user_id );
				$result     = wp_fusion()->crm->update_contact( $contact_id, $update_data, false );

			}
		}

	}

	/**
	 * Run WPF's redirects on restricted LD lessons instead of letting LD take them to the course, so our login redirects work
	 *
	 * @access public
	 * @return string Redirect Link
	 */

	public function lesson_access_redirect( $link, $lesson_id ) {

		$course_id = learndash_get_course_id( $lesson_id );

		if ( ! wp_fusion()->access->user_can_access( $course_id ) ) {

			$redirect = wp_fusion()->access->get_redirect( $course_id );

			if ( ! empty( $redirect ) ) {

				wp_fusion()->access->set_return_after_login( $lesson_id );

				wp_redirect( $redirect, 302, 'WP Fusion; Post ID ' . $lesson_id );
				exit();

			}
		}

		return $link;

	}

	/**
	 * Applies group link tag when user added to group
	 *
	 * @access public
	 * @return void
	 */

	public function added_group_access( $user_id, $group_id ) {

		$settings = get_post_meta( $group_id, 'wpf-settings-learndash', true );

		if ( empty( $settings ) ) {
			return;
		}

		$apply_tags = array();

		if ( ! empty( $settings['tag_link'] ) ) {
			$apply_tags = array_merge( $apply_tags, $settings['tag_link'] );
		}

		if ( ! empty( $settings['apply_tags_enrolled'] ) ) {
			$apply_tags = array_merge( $apply_tags, $settings['apply_tags_enrolled'] );
		}

		if ( ! empty( $apply_tags ) ) {

			// Prevent looping
			remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

			wpf_log( 'info', $user_id, 'User was enrolled in LearnDash group <a href="' . admin_url( 'post.php?post=' . $group_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $group_id ) . '</a>. Applying tags.' );

			wp_fusion()->user->apply_tags( $apply_tags, $user_id );

			add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		}

	}

	/**
	 * Removes group link tag when user removed from group
	 *
	 * @access public
	 * @return void
	 */

	public function removed_group_access( $user_id, $group_id ) {

		$settings = get_post_meta( $group_id, 'wpf-settings-learndash', true );

		if ( empty( $settings ) || empty( $settings['tag_link'] ) ) {
			return;
		}

		// Prevent looping
		remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		wpf_log( 'info', $user_id, 'User was un-enrolled from LearnDash group <a href="' . admin_url( 'post.php?post=' . $group_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $group_id ) . '</a>. Removing linked tag.' );

		wp_fusion()->user->remove_tags( $settings['tag_link'], $user_id );

		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

	}

	/**
	 * Applies the linked tags when a user is added as a group leader.
	 *
	 * @since 3.36.8
	 *
	 * @param int   $user_id  The user ID.
	 * @param int   $group_id The group ID.
	 */
	public function added_group_leader_access( $user_id, $group_id ) {

		$settings = get_post_meta( $group_id, 'wpf-settings-learndash', true );

		if ( empty( $settings ) || empty( $settings['leader_tag'] ) ) {
			return;
		}

		// Prevent looping
		remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		wpf_log( 'info', $user_id, 'User was enrolled as group leader in LearnDash group <a href="' . admin_url( 'post.php?post=' . $group_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $group_id ) . '</a>. Applying linked tag.' );

		wp_fusion()->user->apply_tags( $settings['leader_tag'], $user_id );

		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

	}

	/**
	 * Removes the linked tags when a user is added as a group leader.
	 *
	 * @since 3.36.8
	 *
	 * @param int   $user_id  The user ID.
	 * @param int   $group_id The group ID.
	 */

	public function removed_group_leader_access( $user_id, $group_id ) {

		$settings = get_post_meta( $group_id, 'wpf-settings-learndash', true );

		if ( empty( $settings ) || empty( $settings['leader_tag'] ) ) {
			return;
		}

		// Prevent looping
		remove_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

		wpf_log( 'info', $user_id, 'User was removed as Leader from LearnDash group <a href="' . admin_url( 'post.php?post=' . $group_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $group_id ) . '</a>. Removing linked tag.' );

		wp_fusion()->user->remove_tags( $settings['leader_tag'], $user_id );

		add_action( 'wpf_tags_modified', array( $this, 'update_group_access' ), 10, 2 );

	}

	/**
	 * Applies / removes linked tags when user added to / removed from course
	 *
	 * @access public
	 * @return void
	 */

	public function updated_course_access( $user_id, $course_id, $access_list = array(), $remove = false ) {

		// Sync the name

		if ( false == $remove ) {
			update_user_meta( $user_id, 'ld_last_course_enrolled', get_the_title( $course_id ) );
		}

		// Apply the tags

		$settings = get_post_meta( $course_id, 'wpf-settings-learndash', true );

		if ( empty( $settings ) ) {
			return;
		}

		remove_action( 'wpf_tags_modified', array( $this, 'update_course_access' ), 10, 2 );

		if ( $remove == false ) {

			$apply_tags = array();

			if ( ! empty( $settings['tag_link'] ) ) {
				$apply_tags = array_merge( $apply_tags, $settings['tag_link'] );
			}

			if ( ! empty( $settings['apply_tags_enrolled'] ) ) {
				$apply_tags = array_merge( $apply_tags, $settings['apply_tags_enrolled'] );
			}

			if ( ! empty( $apply_tags ) ) {

				wpf_log( 'info', $user_id, 'User was enrolled in LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a>. Applying tags.' );

				wp_fusion()->user->apply_tags( $apply_tags, $user_id );

			}
		} elseif ( ! empty( $settings['tag_link'] ) ) {

			wpf_log( 'info', $user_id, 'User was unenrolled from LearnDash course <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '" target="_blank">' . get_the_title( $course_id ) . '</a>. Removing linked tag.' );

			wp_fusion()->user->remove_tags( $settings['tag_link'], $user_id );

		}

		add_action( 'wpf_tags_modified', array( $this, 'update_course_access' ), 10, 2 );

	}

	/**
	 * Adds randomly generates passwords to POST data so it can be picked up by user_register()
	 *
	 * @access public
	 * @return string Password
	 */

	public function push_password( $password ) {

		if ( ! empty( $_POST ) ) {
			$_POST['user_pass'] = $password;
		}

		return $password;

	}


	/**
	 * Adds LearnDash field group to meta fields list
	 *
	 * @access  public
	 * @return  array Field groups
	 */

	public function add_meta_field_group( $field_groups ) {

		$field_groups['learndash_progress'] = array(
			'title'  => 'LearnDash Progress',
			'fields' => array(),
		);

		return $field_groups;

	}


	/**
	 * Adds LearnDash meta fields to WPF contact fields list
	 *
	 * @access  public
	 * @return  array Meta Fields
	 */

	public function prepare_meta_fields( $meta_fields ) {

		$meta_fields['ld_last_course_enrolled'] = array(
			'label' => 'Last Course Enrolled',
			'type'  => 'text',
			'group' => 'learndash_progress',
		);

		$meta_fields['ld_last_lesson_completed'] = array(
			'label' => 'Last Lesson Completed',
			'type'  => 'text',
			'group' => 'learndash_progress',
		);

		$meta_fields['ld_last_lesson_completed_date'] = array(
			'label' => 'Last Lesson Completed Date',
			'type'  => 'date',
			'group' => 'learndash_progress',
		);

		$meta_fields['ld_last_course_completed'] = array(
			'label' => 'Last Course Completed',
			'type'  => 'text',
			'group' => 'learndash_progress',
		);

		$meta_fields['ld_last_course_completed_date'] = array(
			'label' => 'Last Course Completed Date',
			'type'  => 'date',
			'group' => 'learndash_progress',
		);

		$meta_fields['ld_last_course_progressed'] = array(
			'label' => 'Last Course Progressed',
			'type'  => 'text',
			'group' => 'learndash_progress',
		);

		return $meta_fields;

	}

	/**
	 * Sets up last lesson / last course fields for automatic sync
	 *
	 * @access  public
	 * @return  array Meta Fields
	 */

	public function watch_meta_fields( $meta_fields ) {

		$meta_fields[] = 'ld_last_lesson_completed';
		$meta_fields[] = 'ld_last_course_completed';
		$meta_fields[] = 'ld_last_course_enrolled';
		$meta_fields[] = 'ld_last_course_progressed';

		return $meta_fields;

	}


	/**
	 * //
	 * // BATCH TOOLS
	 * //
	 **/

	/**
	 * Adds LearnDash courses to available export options
	 *
	 * @access public
	 * @return array Options
	 */

	public function export_options( $options ) {

		$options['learndash_courses'] = array(
			'label'   => __( 'LearnDash course enrollment statuses', 'wp-fusion' ),
			'title'   => __( 'Users', 'wp-fusion' ),
			'tooltip' => sprintf( __( 'For each user on your site, applies tags in %s based on their current LearnDash course enrollments, using the settings configured on each course. <br /><br />Note that this does not apply to course enrollments that have been granted via Groups. <br /><br />Note that this does not enroll or unenroll any users from courses, it just applies tags based on existing course enrollments.' ), wp_fusion()->crm->name ),
		);

		return $options;

	}

	/**
	 * Gets users to be processed
	 *
	 * @access public
	 * @return int Count
	 */

	public function batch_init() {

		$args = array( 'fields' => 'ID' );

		$users = get_users( $args );

		wpf_log( 'info', 0, 'Beginning <strong>LearnDash course enrollment statuses</strong> batch operation on ' . count( $users ) . ' users', array( 'source' => 'batch-process' ) );

		return $users;

	}

	/**
	 * Process user enrollments one at a time
	 *
	 * @access public
	 * @return void
	 */

	public function batch_step( $user_id ) {

		// Get courses
		$enrolled_courses = learndash_user_get_enrolled_courses( $user_id, array() );

		// We won't look at courses a user is in because of a group
		$groups_courses = learndash_get_user_groups_courses_ids( $user_id );

		$enrolled_courses = array_diff( $enrolled_courses, $groups_courses );

		if ( ! empty( $enrolled_courses ) ) {

			foreach ( $enrolled_courses as $course_id ) {

				wpf_log( 'info', $user_id, 'Processing LearnDash course enrollment status for <a href="' . admin_url( 'post.php?post=' . $course_id . '&action=edit' ) . '">' . get_the_title( $course_id ) . '</a>', array( 'source' => 'batch-process' ) );

				$this->updated_course_access( $user_id, $course_id );

			}
		}
	}

}

new WPF_LearnDash();

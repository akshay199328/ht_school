<?php
/**
 * Initialization functions for WPLMS
 *
 * @author      VibeThemes
 * @category    Admin
 * @package     Initialization
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class WPLMS_Course_Component_Init{

    public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_Course_Component_Init();

        return self::$instance;
    }



    private function __construct(){
        add_action('wp_enqueue_scripts',array($this,'wplms_course_data'));
    }

    function wplms_course_data(){
        
        $enqueued = false;
        if(function_exists('bp_is_user') && bp_is_user()){
            $enqueued = true;
        }
        if(apply_filters('vibebp_enqueue_profile_script',$enqueued)){
        
            wp_dequeue_script('wplms');
            //development
            wp_enqueue_script('tabulator',plugins_url('../../assets/js/tabulator.min.js',__FILE__),array('wp-element','wp-data'),WPLMS_PLUGIN_VERSION,true);
            wp_enqueue_style('tabulator-css',plugins_url('../../assets/css/tabulator.min.css',__FILE__),array(),WPLMS_PLUGIN_VERSION);
            wp_enqueue_script('wplms-course-component-js',plugins_url('../../assets/js/wplms.js',__FILE__),array('wp-element','wp-data'),WPLMS_PLUGIN_VERSION,true);
            add_action('wp_footer',function(){
                echo '<div id="quiz_popup"></div>';
            });
            if(class_exists('\Elementor\Plugin')){
                $elementorFrontend = new \Elementor\Frontend();
                $elementorFrontend->enqueue_scripts();
                $elementorFrontend->enqueue_styles();
            }

            $tips = WPLMS_tips::init();
            if(!empty($tips->lms_settings['general']['advanced_video_format_dash'])){
                wp_enqueue_script('wplms-video-format-dash',plugins_url('../../assets/js/dash.all.min.js',__FILE__),array(),WPLMS_PLUGIN_VERSION,true);
            }
            if(!empty($tips->lms_settings['general']['advanced_video_format_hls'])){
                wp_enqueue_script('wplms-video-format-hls',plugins_url('../../assets/js/hls.min.js',__FILE__),array(),WPLMS_PLUGIN_VERSION,true);
            }

            wp_enqueue_script('wplms-custom-support-js',plugins_url('../../assets/js/custom-support.js',__FILE__),array('wplms-course-component-js'),WPLMS_PLUGIN_VERSION,true);

            wp_enqueue_style('wplms-cc',plugins_url('../../assets/css/wplms.css',__FILE__),array(),WPLMS_PLUGIN_VERSION);
            wp_localize_script('wplms-course-component-js','wplms_course_data',$this->get_wplms_course_data()); 

            wp_enqueue_script('wplms-scorm',plugins_url('../vibe-shortcodes/js/scorm2.js',__FILE__),array('wp-element','wp-data'),WPLMS_PLUGIN_VERSION);

        }
        
    }

    function generate_token($user_id,$client_id){

        $access_token = wp_generate_password(40);
        do_action( 'wplms_auth_set_access_token', array(
            'access_token' => $access_token,
            'client_id'    => $client_id,
            'user_id'      => $user_id
        ) );

        $expires = time()+86400*7;
        $expires = date( 'Y-m-d H:i:s', $expires );

        $tokens = get_user_meta($user_id,'access_tokens',true);
        if(empty($tokens)){$tokens = array();}else if(in_array($access_token,$tokens)){$k = array_search($access_token, $tokens);unset($tokens[$k]);delete_user_meta($user_id,$access_token);
        }
        
        $tokens[] = $access_token;
        update_user_meta($user_id,'access_tokens',$tokens);

        $token = array(
            'access_token'=> $access_token,
            'client_id' => $client_id,
            'user_id'   =>  $user_id,
            'expires'   => $expires,
            'scope'     => $scope,
            );
        
        update_user_meta($user_id,$access_token,$token);

        return $token;
    }

    function get_wplms_course_data(){
        $blog_id = '';
        if(function_exists('get_current_blog_id')){
            $blog_id = get_current_blog_id();
        }
        $curriculum_accordion =false;
        $randomize_question_options=false;
        $enable_assign_quiz = false;
        if(class_exists('WPLMS_tips')){
            $tips = WPLMS_tips::init();
            if(isset($tips) && isset($tips->settings)){
                if(!empty($tips->settings['curriculum_accordion']))
                    $curriculum_accordion = true;
                $randomize_question_options = $tips->settings['randomize_question_options'];
                $randomize_question_options = (empty($randomize_question_options)?false:true);
            }
            if(!empty($tips->settings['enable_assign_quiz'])){
                $enable_assign_quiz = true;
            }
        }
        $finished_access = 0;

        if(function_exists('vibe_get_option') && !empty(vibe_get_option('finished_course_access'))){
            $finished_access = 1;
        }
        $admin_approval = false;

        if(function_exists('vibe_get_option') && vibe_get_option('new_course_status')=='pending'){
            $admin_approval = true;
        }

        $stats_visibility = false;

        if(function_exists('vibe_get_option') ){
            $stats_visibility = vibe_get_option('stats_visibility');
        }

        $disable_contextmenu_course_status = false;

        if(function_exists('vibe_get_option') && !empty(vibe_get_option('disable_contextmenu_course_status'))){
            $disable_contextmenu_course_status = true;
        }


        $wplms_course_data = apply_filters('wplms_course_settings',array(

            'api_url'=> apply_filters('vibebp_rest_api',get_rest_url($blog_id,WPLMS_API_NAMESPACE)),
            'user_id'=>get_current_user_id(), 
            'home_url'=>get_home_url(), 
            'timestamp'=>time(),
            'chartjs'=>plugins_url('../../assets/js/Chart.min.js',__FILE__),
            'jquery' =>    includes_url( '/js/jquery/jquery.js' ),
            'dynamic_scripts' => apply_filters('wplms_load_dynamic_scripts',array(
                array('id'=>'shortcodesjs','src'=>plugins_url('../vibe-shortcodes/js/shortcodes.js',__FILE__)),
            )),
            'flickityjs'=>plugins_url('../../assets/js/flickity.min.js',__FILE__),
            'assigments_enabled'=>(function_exists('wplms_assignments_stats')),
            'user_id'=>get_current_user_id(), 
            'timestamp'=>time(),
            'instructor'=>'edit_posts',
            'disable_contextmenu' =>$disable_contextmenu_course_status,
            'instructor_see_student_controls'=>empty($tips->lms_settings['general']['remove_instructor_student_controls'])?0:$tips->lms_settings['general']['remove_instructor_student_controls'],
            'start_popup'=>false,
            'submit_popup'=>true,
            'security'=>function_exists('vibebp_get_setting')?vibebp_get_setting('client_id'):'',
            'curriculum_accordion'=>$curriculum_accordion,
            'client_id'=>vibebp_get_setting('client_id'),
            'show_directory'=>empty($tips->lms_settings['general']['show_course_directory'])?0:$tips->lms_settings['general']['show_course_directory'],
            'orderby'=>array(
                'date'=>__('Recent','wplms'),
                'title'=>__('Alphabetical','wplms'),
                'comment_count'=>__('Popular','wplms'),
            ),
            'question_retries' => apply_filters('wplms_question_retires',1),
            'practice_questions' => 25,
            'question_option_rearrange'=> apply_filters('wplms_question_option_rearrange',$randomize_question_options),
            'enable_assign_quiz' => $enable_assign_quiz,
            'time_labels' => array(
                'year' => array('single'=>_x('year','time_labels','wplms'),'multi'=>_x('years','time_labels','wplms'),'symbol'=>_x('Y','time_labels','wplms')),
                
                'month' => array('single'=>_x('month','time_labels','wplms'),'multi'=>_x('months','time_labels','wplms'),'symbol'=>_x('M','time_labels','wplms')),
                'week' => array('single'=>_x('week','time_labels','wplms'),'multi'=>_x('weeks','time_labels','wplms'),'symbol'=>_x('W','time_labels','wplms')),
                'day' => array('single'=>_x('day','time_labels','wplms'),'multi'=>_x('days','time_labels','wplms'),'symbol'=>_x('d','time_labels','wplms')),
                'hour' => array('single'=>_x('hour','time_labels','wplms'),'multi'=>_x('hours','time_labels','wplms'),'symbol'=>_x('h','time_labels','wplms')),
                'minute' => array('single'=>_x('minute','time_labels','wplms'),'multi'=>_x('minutes','time_labels','wplms'),'symbol'=>_x('m','time_labels','wplms')),
                'second' => array('single'=>_x('second','time_labels','wplms'),'multi'=>_x('seconds','time_labels','wplms'),'symbol'=>_x('s','time_labels','wplms')),
            ),
            'course'=>array(
                'admin_approval' => $admin_approval,
                'orderby'=>array(
                    'date'=>__('Recent','wplms'),
                    'alphabetical'=>__('Alphabetical','wplms'),
                    'popular'=>__('Popular','wplms'),
                ),
               'stats_visibility' => (int)$stats_visibility,
                'order'=>array(
                    'ASC'=>__('Ascending','wplms'),
                    'DESC'=>__('Descending','wplms'),
                ),
                'status'=>array(
                    'seek_lock'=>false,
                    'video_unit_complete'=>true,
                ),

                'admin'=>array(
                    'finished_access' => $finished_access,
                    'student_orderby'=>array(
                        'all'=>__('Sort Student','wplms'),
                        'recently_joined'=>__('Recently joined','wplms'),
                        'alphabetical'=>__('Alphabetical','wplms'),
                        'toppers'=>__('Toppers','wplms'),
                    ),
                    'access'=>array(
                        'all'=>__('Select Access Status','wplms'),
                        'active'=>__('Active','wplms'),
                        'expired'=>__('Expired','wplms'),
                    ),
                    'status'=>array(
                        '0'=>__('Select Course Status','wplms'),
                        '1'=>__('Start Course','wplms'),
                        '2'=>__('Continue Course','wplms'),
                        '3'=>__('Under Evaluation','wplms'),
                        '4'=>__('Completed','wplms'),
                    ),
                     'statuses'=>array(
                        '0'=>__('Select Status','wplms'),
                        '1'=>__('Start','wplms'),
                        '2'=>__('Continue','wplms'),
                        '3'=>__('Under Evaluation','wplms'),
                        '4'=>__('Completed','wplms'),
                    ),
                    'activity_sorters'=>function_exists('bp_course_activity_actions')?bp_course_activity_actions():array(),
                    'sample_import_students_file' => plugins_url('../samplecsv/students_import.csv',__FILE__),
                    'submission_orderby' => array(
                        'meta_id'=>__('By time','wplms'),
                        'alphabetical'=>__('Alphabetical','wplms'),
                        
                    ),
                ),
                'submission_quiz_statuses'=>array(
                            array('value'=> 3,'label'=>_x('Pending evaluation','submission status','wplms')),
                            array('value'=> 4,'label'=>_x('Evaluation complete','submission status','wplms')),
                        ),
                'submission_assignment_statuses'=>array(
                            array('value'=> 0,'label'=>_x('Pending evaluation','submission status','wplms')),
                            array('value'=> 1,'label'=>_x('Evaluation complete','submission status','wplms')),
                            array('value'=> 2,'label'=>_x('Unsubmitted','submission status','wplms')),
                        ),
                
            ),
            'leaderboard'=>array(
                'sorters'=>array(
                    'date_recorded'=>__('Date recorded','wplms'),
                    'score'=>__('Score','wplms'),
                    'alphabetical'=>__('Alphabetical','wplms'),
                )
            ),
            'notes'=>array(
                'tabs'=>array(
                    array(
                        'label'=>__('Notes','wplms'),
                        'key'=>'notes',
                    ),
                    array(
                        'label'=>__('Discussions','wplms'),
                        'key'=>'discussions',
                    ),
                    array(
                        'label'=>__('Reviews','wplms'),
                        'key'=>'reviews',
                    )
                ),
                'orderby'=>array(
                    'recent'=>__('Recency','wplms'),
                ),
            ),
            'qna'=>array(
                'tabs'=>array(
                    array(
                        'label'=>__('Pending','wplms'),
                        'key'=>'pending',
                    ),
                    array(
                        'label'=>__('Answered','wplms'),
                        'key'=>'answered',
                    ),array(
                        'label'=>__('Comments','wplms'),
                        'key'=>'comments',
                    ),
                ),
                'orderby'=>array(
                    'recent'=>__('Recently asked','wplms'),
                ),
            ),
            'reports'=>array(
                'module'=>array(
                    'activity'=>_x('Activity','reports','wplms'),
                    'student'=>_x('Student','reports','wplms'),
                    'course'=>_x('Course','reports','wplms'),
                    'quiz'=>_x('Quiz','reports','wplms'),
                    'assignment'=>_x('Assignment','reports','wplms'),
                    'unit'=>_x('Unit','reports','wplms'),
                    'question'=>_x('Question','reports','wplms'),
                ),
                'secondary'=>array(
                    'activity'=>_x('Activity','reports','wplms'),
                    'student'=>_x('Student','reports','wplms'),
                ),
                'properties'=>array(
                    'activity'=>array(
                        array(
                            'from'  =>'activity',
                            'label' =>_x('Type','reports','wplms'),
                            'type'  => 'array',
                            'supports'=>'all',
                            'filterable'=>true,
                            'key'   => 'date_recorded',
                            'values'=>bp_course_activity_actions()
                        ),
                        array(
                            'from'  =>'activity',
                            'label' =>_x('Date Recorded','reports','wplms'),
                            'type'  => 'date',
                            'supports'=>'all',
                            'filterable'=>true,
                            'key'   => 'date_recorded'
                        ),
                        array(
                            'from'  =>'activity_meta',
                            'label' =>_x('Percentage','reports','wplms'),
                            'type'  => 'number',
                            'supports'=>array('student'),
                            'filterable'=>true,
                            'key'   => 'percentage'
                        ),
                        array(
                            'from'  =>'activity',
                            'label' =>_x('Item Id','reports','wplms'),
                            'type'  => 'id',
                            'supports'=> array('course'),
                            'key'   => 'item_id'
                        ),
                        array(
                            'from'  =>'activity',
                            'label' =>_x('Seconday Item Id','reports','wplms'),
                            'type'  => 'id',
                            'supports'=> array('quiz','assignment','unit'),
                            'key'   => 'secondary_item_id'
                        ),
                        array(
                            'from'  =>'activity',
                            'label' =>_x('User','reports','wplms'),
                            'type'  => 'id',
                            'supports' => array('student'),
                            'key'   => 'user_id'
                        ),
                    ),
                    'student'=>array(
                        array(
                            'from'  =>'users',
                            'label' =>_x('Name','reports','wplms'),
                            'type'  => 'text',
                            'key'   => 'display_name'
                        ),
                        array(
                            'from'  =>'users',
                            'label' =>_x('Email','reports','wplms'),
                            'type'  => 'text',
                            'key'   => 'display_name'
                        ),
                        array(
                            'from'  =>'user_fields',
                            'label' =>_x('User Field','reports','wplms'),
                            'type'  => 'array',
                            'key'   => 'fields',
                            'filterable' => true,
                            'multiple'  => true, //Multiple values can be selected
                            'values'=>'fetch'
                        ),
                    ),
                    'course'=>array(
                        array(
                            'from'=>'post',
                            'label'=>_x('Title','reports','wplms'),
                            'type'=> 'text',
                            'key' => 'post_title'
                        ),
                        array(
                            'from'=>'taxonomy',
                            'label'=>_x('Course Category','reports','wplms'),
                            'key' => 'course-cat',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => 2, //Multiple values can be selected
                            'values'=>'fetch' // API it required to fetch terms
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Average Rating','reports','wplms'),
                            'key' => 'average_rating',
                            'filterable' => true,
                            'type'=> 'number',
                            'multiple'  => 2, //between
                            'values'=>[0,1,2,3,4,5] //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Rating Count','reports','wplms'),
                            'key' => 'average_rating',
                            'type'=> 'number',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>[0,1,5,10,20,50,100,200,500,1000] //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Seats','reports','wplms'),
                            'key' => 'vibe_max_students',
                            'type'=> 'number',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>[0,1,5,10,20,50,100,200,500,1000] //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Start Date','reports','wplms'),
                            'key' => 'vibe_start_date',
                            'type'=> 'calendar',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>0 //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Course Duration','reports','wplms'),
                            'key' => 'vibe_duration',
                            'type'=> 'duration',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>array(
                                0=>__('any duratin','wplms'),
                                86400 =>_x('1 day','','wplms'),
                                7*86400 =>_x('1 Week','','wplms'),
                                30*86400 =>_x('1 Month','','wplms'),
                                2*86400 =>_x('2 Month','','wplms'),
                                365*86400 =>_x('1 Year','','wplms'),
                            ) //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Badge awarding percentage','reports','wplms'),
                            'key' => 'vibe_course_badge_percentage',
                            'type'=> 'number',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>[0,10,20,30,50,60,70,80,90,100] //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Certificate awarding percentage','reports','wplms'),
                            'key' => 'vibe_course_passing_percentage',
                            'type'=> 'number',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>[0,10,20,30,50,60,70,80,90,100] //Less than equal to
                        ),
                        array(
                            'from'=>'post',
                            'label'=>_x('Publish Date','reports','wplms'),
                            'key' => 'post_date',
                            'type'=> 'calendar',
                            'filterable' => true,
                            'multiple'  => 2,  // between
                            'values'=>[] //Less than equal to
                        ),
                        array(
                            'from'=>'meta',
                            'label'=>_x('Free Course','reports','wplms'),
                            'key' => 'vibe_course_free',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => 1,  // between
                            'values'=>[array('key'=>'H','label'=>_x('Disabled','reports','wplms')),array('key'=>'S','label'=>_x('Enabled','reports','wplms'))] //Less than equal to
                        ),
                    ),
                    'quiz'=>array(
                        array(
                            'from'=>'post',
                            'label'=>_x('Title','reports','wplms'),
                            'type'=> 'text',
                            'key' => 'post_title'
                        ),
                        array(
                            'from'=>'taxonomy',
                            'label'=>_x('Quiz Type','reports','wplms'),
                            'key' => 'quiz-type',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => true, //Multiple values can be selected
                            'values'=>'fetch' // API it required to fetch terms
                        ),
                    ),
                    'assignment'=>array(
                        array(
                            'from'=>'post',
                            'label'=>_x('Title','reports','wplms'),
                            'type'=> 'text',
                            'key' => 'post_title'
                        ),
                        array(
                            'from'=>'taxonomy',
                            'label'=>_x('Assignment Type','reports','wplms'),
                            'key' => 'assignment-type',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => true, //Multiple values can be selected
                            'values'=>'fetch' // API it required to fetch terms
                        ),
                    ),
                    'unit'=>array(
                        array(
                            'from'=>'post',
                            'label'=>_x('Title','reports','wplms'),
                            'type'=> 'text',
                            'key' => 'post_title'
                        ),
                        array(
                            'from'=>'taxonomy',
                            'label'=>_x('Unit Tag','reports','wplms'),
                            'key' => 'module-tag',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => true, //Multiple values can be selected
                            'values'=>'fetch' // API it required to fetch terms
                        ),
                    ),
                    'question'=>array(
                        array(
                            'from'=>'post',
                            'label'=>_x('Title','reports','wplms'),
                            'type'=> 'text',
                            'key' => 'post_title'
                        ),
                        array(
                            'from'=>'taxonomy',
                            'label'=>_x('Question Tag','reports','wplms'),
                            'key' => 'question-tag',
                            'type'=> 'array',
                            'filterable' => true,
                            'multiple'  => true, //Multiple values can be selected
                            'values'=>'fetch' // API it required to fetch terms
                        ),
                    )
                )
            ),
            'sample_questions'=>array(
                array(
                    'label'=>_x('True or False','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/truefalse.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Multiple Choice Single Answer','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/mcq.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Multiple Choice Multiple Answers','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/mcc.csv',__FILE__),
                ),array(
                    'label'=>_x('Fill in the Blank','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/fill.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Select Dropdown','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/select.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Sort Answers','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/sort.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Match Answers','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/match.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Simple Text','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/text.csv',__FILE__),
                ),
                array(
                    'label'=>_x('Essay Type/ Large Text','sample questions','wplms'),
                    'value'=>plugins_url('../samplecsv/essay.csv',__FILE__),
                ),
            ),
            'translations'=>array(
                'post_review' => _x('Post review','','wplms'),
                'review_rating' => _x('Review rating','','wplms'),
                'attempted' => _x('Attempted','','wplms'),
                'answer' => _x('Answer','','wplms'),
                'fullusername_or_email' => _x('Enter full username or email','','wplms'),
                'assigned' => _x('Assigned','','wplms'),
                'assign' => _x('Assign','','wplms'),
                'published' => _x('Published','','wplms'),
                'pending' => _x('Pending','','wplms'),
                'close' => _x('Close','','wplms'),
                'print_results' => _x('Print Results','','wplms'),
                'show_bookmarked'=>__('Show bookmarked questions','wplms'),
                'bookmark_confirm' => _x('There are some bookmarked questions in quiz. Are you sure you want to submit the quiz?','','wplms'),
                'show_wrong_attempts' => __('Show wrong attempts','wplms'),
                'show_correct_attempts' => __('Show correct attempts','wplms'),
                'previous_results' =>  __('Previous Results','wplms'),
                'results_not_available' => __('Results not Available','wplms'),
                'course_starts_on'=> _x('Course Starts On','','wplms'),
                'select_question_tags' => _x('Select Questions from Tags','','wplms'),
                'select_create_questions' => _x('Select/Create Questions','','wplms'),
                'retry' => _x('Retry','','wplms'),
                'enter_time_amount' =>  _x('Enter time amount','','wplms'),
                'refresh' => _x('Refresh','','wplms'),
                'upload_csv_to_add_students' => _x('Upload csv file to add students to this course','','wplms'),
                'take_this_course'=>_x('Take this Course','course button status','wplms'),
                'apply_to_course' => _x('Apply for course?','course button','wplms'),
                'ok' => _x('ok','course button','wplms'),
                'yes' => _x('Yes','course button','wplms'),
                'cancel' => _x('Cancel','course button','wplms'),
                'course_starts_on' => _x('Course Starts On ','','wplms'),
                'click_to_upload' => _x('Click to upload','','wplms'),
                'sure_delete' => _x('Are you sure you want to delete this item?','','wplms'),
                'download_sample' => _x('Download sample','csv stident','wplms'),
                'upload' => _x('Upload and Import Users','','wplms'),
                'no_curriculum' => _x('No curriculum set','course status','wplms'),
                'ok'=>_x('OK','','wplms'),
                'search_course_elements' => _x('Search course elements','','wplms'),
                'approve' => _x('Approve','','wplms'),
                'reject' => _x('Reject','','wplms'),
                'retake_course' => _x('Retake Course','','wplms'),
                'change_marks' =>_x('Change Marks','','wplms'), 
                'remove_user' =>_x('Remove User','','wplms'),
                'sure' => _x('Are you sure','','wplms'),
                'course_instructions' => _x('Course Instructions','','wplms'),
                'complete_unit_assignments'=>_x('Please Complete Unit Assigmments','',''),
                'download_attachment'=>_x('Download Attachment','','wplms'),
                'generate_stats'=>_x('Generate Stats','','wplms'),
                'no_stats_found'=>_x('No stats found','','wplms'),
                'no_courses_found'=>_x('No course found','manage courses','wplms'),
                'search_courses'=>_x('Search courses','manage courses','wplms'),
                'active' => _x('Active','','wplms'),
                'expired' => _x('Expired','','wplms'),
                'finished' => _x('Finished','','wplms'),
                'error_finishing_course' => _x('There was some error occured finishing the course','','wplms'),
                'instructor_question'=> _x('Question for Instructor','','wplms'),
                'ask_instructor'=> _x('Ask the instructor.','','wplms'),
                'error_review_form' => _x('There was some error posting review','','wplms'),
                'back_to_my_courses'=>_x('Back to my courses','','wplms'),
                'please_check_review_form'=>_x('Please check Review form.Its necessary that you provide rating , and review!','','wplms'),
                'review_title' => _x('Review Title','','wplms'),
                'enter_title' => _x('Please enter title of the course','','wplms'),
                'rating' => _x('Rate this course','','wplms'),
                'your_review' => _x('Your Review','','wplms'),
                'skip_review_and_finish_course'=>_x('Skip review and finish course','','wplms'),
                'submit_review_and_finish_course' => _x('Submit Review and finish course','','wplms'),
                'assignments' => _x('Assignments','','wplms'),
                'marks_obtained' => _x('Marks Obtained','','wplms'),
                'uploaded' => _x('Uploaded','','wplms'),
                'uploaded_files' => _x('Uploaded Files','','wplms'),
                'resubmit' => _x('Re-submit','','wplms'),
                'start_assigmment'=>_x('Start Assignment','','wplms'),
                'allowed_file_extenstions' => _x('Allowed File Extensions','','wplms'),
                'submit_assignment' => _x('Submit assignment','','wplms'),
                'image_type_error'=>_x('Image type not allowed','','wplms'),
                'image_size_error'=> _x('Image size not allowed','','wplms'),
                'select_image'=> _x('Select File','','wplms'),
                'no_more_comments' => _x('No More Comments!','','wplms'),
                'show_more' => _x('Show More','','wplms'),
                'load_more' => _x('Load More','','wplms'),
                'anonymous'=>_x('Anonymous','','wplms'),
                'error'=>_x('Some error occured','','wplms'),
                'insufficientdata'=>_x('Insufficient data','','wplms'),
                'add_more_content' => _x('Please add more content to comment','','wplms'),
                'add_comment' =>_x('Add comment','','wplms'),
                'edit_comment'=>_x('Edit comment','','wplms'),
                'date'=>_x('Date','','wplms'),
                'select_option'=>_x('Select Option','','wplms'),
                'course'=>_x('Course','','wplms'),
                'quiz'=>_x('Quiz','','wplms'),
                'true' => _x('True','','wplms'),
                'false' => _x('False','','wplms'),
                'start'=>_x('Start Quiz','','wplms'),
                'continue'=>_x('Continue Quiz','','wplms'),
                'submit'=>_x('Submit Quiz','','wplms'),
                'reset'=>_x('Reset','','wplms'),
                'start_quiz'=>_x('Start quiz','','wplms'),
                'continue_quiz'=>_x('Start quiz','','wplms'),
                'check_answer'=>_x('Check Answer','','wplms'),
                'expired' => _x('Expired','','wplms'),
                'days' => _x('Days','','wplms'),
                'hours' => _x('Hours','','wplms'),
                'minutes' => _x('Minutes','','wplms'),
                'seconds' => _x('Seconds','','wplms'),
                'correct_answer' => _x('Correct Answer','','wplms'),
                'question' => _x('QUESTION','','wplms'),
                'check_results' => _x('Check Results','','wplms'),
                'save_quiz' => _x('Save Quiz','','wplms'),
                'save_course'=>_x('Save Course','','wplms'),
                'create_course'=>_x('Create Course','','wplms'),
                'saving' => _x('Saving....','','wplms'),
                'no'=>_x('No','','wplms'),
                'start_quiz_confirm'=>_x('Do you really want to start the quiz?','','wplms'),
                'submit_quiz_confirm'=>_x('Do you really want to submit the quiz?','','wplms'),
                'submit_quizes_confirm'=>_x('Are you sure you want to Submit?','','wplms'),
                'unanswered_confirm'=>_x('You have some unanswered questions.','','wplms'),
                'total_marks' => _x('Total Marks','','wplms'),
                'unattempted' =>_x('Unattempted','','wplms'),
                'correct' => _x('Correct','','wplms'),
                'correct_percentage' => _x('Correct Percentage','','wplms'),
                'incorrect'=>_x('Incorrect','','wplms'),
                'historical' => _x('Overall correct percentages by each question','','wplms'),
                'correct_by_tag' => _x('Correct % by question tag','','wplms'),
                'q' => _x('Q','Advance stats for question in quiz result','wplms'),
                'retake' => _x('Retake Quiz','','wplms'),
                'retakes_left'  => _x('Retakes Left','','wplms'),
                'no_finished_courses' => _x('No finished courses.','','wplms'),
                'date'=>_x('Date','','wplms'),
                'select_option'=>_x('Select Option','','wplms'),
                'course'=>_x('Course','','wplms'),
                'create_course'=>_x('Create course','','wplms'),
                'results_found' => _x('results found','','wplms'),
                'no_content_found'=>_x('No content found','','wplms'),
                'attachments'=>_x('Attachments','','wplms'),
                'reset'=>_x('Reset','','wplms'),
                'expired' => _x('Expired','','wplms'),
                'days' => _x('Days','','wplms'),
                'hours' => _x('Hours','','wplms'),
                'minutes' => _x('Minutes','','wplms'),
                'seconds' => _x('Seconds','','wplms'),
                'type_keyword'=>_x('Type a keyword','','wplms'),
                'yes'=>_x('Yes','','wplms'),
                'no'=>_x('No','','wplms'),
                'submit_button'=>_x('Submit','','wplms'),
                'cancel_button'=>_x('Cancel','','wplms'),
                'add_unit' => _x('Add unit','','wplms'),
                'add_section' => _x('Add section','','wplms'),
                'add_quiz' => _x('Add quiz','','wplms'),
                'add_assignment' => _x('Add assignment','','wplms'),
                'section_name' => _x('Section Name','','wplms'),
                'set' => _x('Set','','wplms'),
                'add_option' => _x('Add Option','','wplms'),
                'add_dynamic_questions_tag' => _x('ADD DYNAMIC QUESTION SECTION TAGS','','wplms'),
                'question_tags' => _x('Question Tags','','wplms'),
                'per_marks' => _x('per Marks','','wplms'),
                'number' => _x('Number','','wplms'),
                'remove' => _x('Remove','','wplms'),
                'description' => _x('Description','','wplms'),
                'sale_price_error' => _x('Sale Price cannot be greater than Regular Price','','wplms'),
                'na'=>_x('NA','','wplms'),
                'no_courses_found' => _x('No Courses Found!','','wplms'),

                //start course//continue course//under evaluation//finished course
                'start_course'=> _x('Start Course','','wplms'),
                'continue_course'=> _x('Continue Course','','wplms'),
                'under_evalaution'=> _x('Under Evaluation','','wplms'),
                'finished_course'=> _x('Finished Course','','wplms'),

                'next' => _x('Next','','wplms'),
                'mark_complete' => _x('Mark Complete','','wplms'),
                'prev' => _x('Previous','','wplms'),
                'search_student'=> _x('Search Student','course admin','wplms'),
                'members_not_found'=> _x('No Students found','course admin','wplms'),
                'assign_certificate'=> _x('Assign Certificate to Student','course admin','wplms'), 
                'extend_subscription'=> _x('Extend Student access for Course','course admin','wplms'),
                'change_status'=> _x('Change status','course admin','wplms'),
                'reset_course'=> _x('Reset Student Course progress','course admin','wplms'),
                'user_activity'=> _x('Student Activity in Course','course admin','wplms'), 
                'user_stats'=> _x('Student Statistics in Course','course admin','wplms'), 
                'remove_user'=> _x('Remove Student','course admin','wplms'),
                'search_student_to_add'=> _x('Search student ','course admin','wplms'), 
                'add_students_to_course'=> _x('Add students to course','course admin','wplms'),
                'missing_data'=>__('Missing data','wplms'),
                'select_badge_certificate_assign'=>__('Select Badge/Certificate Assign','wplms'),
                'assign_badge_certificate'=>__('Assign Action','wplms'),
                'select_course_status'  =>__('Select Course Status','wplms'),
                'select_course'  =>__('Select a Course','wplms'),
                'change_course_status'=>__('Change course status','wplms'),
                'select_extend_subscription' =>__('Select Extend Subscription','wplms'),
                'extend_subscription'=>__('Extend Subscription','wplms'),
                'enter_marks'=>__('Enter Marks','wplms'),
                'add_badge' =>__('Add Badge','wplms'),
                'add_certificate'=>__('Add Certificate','wplms'),
                'remove_badge' =>__('Remove Badge','wplms'),
                'remove_certificate'=>__('Remove Certificate','wplms'),
                'no_activity'=>__('No activity','wplms'),
                'back_to_timeline'=>_x('Back to Timeline',' status course','wplms'),
                'no_comments'=>_x('No comments.',' status course','wplms'),
                'just_now'=>_x('Just now',' status course','wplms'),
                'unlimited_time'=>_x('Unlimited time',' status course','wplms'),
                'filter_by'=>_x('Filter',' status course','wplms'),
                'my_badges'=>_x('My Badges',' profile','wplms'),
                'my_certificates'=>_x('My Certificates',' profile','wplms'),
                'my_courses'=>_x('Finished Courses',' profile','wplms'),
                'statistics'=>_x('Statistics',' manage assignments','wplms'),
                'view'=>_x('View',' manage assignments','wplms'),
                'activity'=>_x('Activity',' manage assignments','wplms'),
                'leaderboard'=>_x('Leaderboard',' manage assignments','wplms'),
                'upload_file'=>_x('Upload File',' manage assignments','wplms'),
                'upload_a_file' => _x('Please upload a file',' manage assignments','wplms'),
                'select_quiz'=>_x('Select Quiz',' manage submission','wplms'),
                'submission_by'=>_x('Submission by',' manage submission','wplms'),
                'set_question_marks'=>_x('Set question marks',' manage submission','wplms'),
                'update_marks'=>_x('Update Marks',' manage submission','wplms'),

                'complete'=>_x('Complete',' manage submission','wplms'),
                'complete_course'=>_x('Complete Course',' manage submission','wplms'),
                'complete_assignment'=>_x('Complete Assignment',' manage assignment','wplms'),
                'view_submission'=>_x('View Submission',' manage submission','wplms'),
                'question_explanation'=>_x('Answer Explanation',' manage submission','wplms'),
                'correct_answer'=>_x('Correct Answer',' manage submission','wplms'), 
                'marked_answer'=>_x('Marked Answer',' manage submission','wplms'),
                'select_file' => _x('Select File','','wplms'),
                'instructor_remarks'=>_x('Instructor Remarks',' manage submission','wplms'),
                'update_submission'=>_x('Update Submission',' manage submission','wplms'),
                'submissions'=>_x('Submissions',' manage submission','wplms'),
                'submission'=>_x('Submission',' manage submission','wplms'),
                'search'=>_x('Type to search..',' reports','wplms'),
                'select_option'=>_x('Select Option',' reports','wplms'),
                'report_title'=>_x('Report Title',' reports','wplms'),
                'report_steps'=>_x('Report Steps',' reports','wplms'),
                'add_module'=>_x('Add Module',' reports','wplms'),
                'step'=>_x('Step ',' reports','wplms'),
                'module'=>_x('Module ',' reports','wplms'),
                'filter'=>_x('Filter ',' reports','wplms'),
                'sorter'=>_x('Sorter',' reports','wplms'),
                'increasing'=>_x('Increasing',' reports','wplms'),
                'decreasing'=>_x('Decreasing',' reports','wplms'),
                'back'=>_x('Back',' reports','wplms'),
                'answer_question'=>_x('Answer Question',' reports','wplms'),
                'mark_answered'=>_x('Mark Answered',' reports','wplms'),
                'download' => _x('Download','','wplms'),
                'news_content'=> _x('News Content','course news','wplms'),
                'news_category'=> _x('News Tag','course news','wplms'),
                'news_title'=> _x('News Title','course news','wplms'),
                'create_news'=> _x('Create News','course news','wplms'),
                'edit_news'=> _x('Edit News','course news','wplms'),
                'annoucement'=> _x('Announcement','course announcemnet','wplms'),
                'preview'=> _x('Preview','course announcemnet','wplms'),
                'add_question'=>_x('Add Question','comment reply','wplms'),
                'import_questions'=>_x('Import questions','manage questions','wplms'),
                'export_questions'=>_x('Export data','manage questions','wplms'),
                'download_sample'=>_x('Download sample','manage questions','wplms'),
                'select_import_file'=>_x('Select Import File','manage questions','wplms'),
                
                'reply' => _x('Reply','','wplms'),
                'proceed_next_unit'=>_x('Proceed to next unit','course status','wplms'),
                'note'=>_x('Your Notes on Topic','course status','wplms'),
                'public'=>_x('Public Comments on Topic','course status','wplms'),
                'hide_panel'=>_x('HIDE PANEL','course status','wplms'),
                'show_panel'=>_x('SHOW PANEL','course status','wplms'),
                'quiz_submitted'=>_x('Quiz Submitted','course status','wplms'),
                'no_time_limit'=>_x('No Time Limit','course status','wplms'),
                'previous_unit'=>_x('Previous Unit','course status','wplms'),
                'next_unit'=>_x('Next Unit','course status','wplms'),
                'minimise_screen'=>_x('Minimise screen','course status','wplms'),
                'maximise_screen'=>_x('Maximise screen','course status','wplms'),
                'answer_explanation'=>_x('Answer Explanation',' quiz result','wplms'),
                'lesson_count'=>_x('Lessons',' curriclum','wplms'),
                'passed'=>_x('Passed',' quiz status','wplms'),
                'failed'=>_x('Failed',' quiz status','wplms'),
                'hide_questions'=>_x('Hide Questions',' quiz status','wplms'),
                'show_questions'=>_x('Show Questions',' quiz status','wplms'),
                'achievement_certificate'=>_x('Achievement Certificate',' quiz status','wplms'),
                'select_module'=>_x('Select Module',' quiz status','wplms'),
                'course_directory'=>_x('Course Directory',' quiz status','wplms'),
                'select_questions_filetype'=>_x('Select Question type file',' import questions','wplms'), 
                'select_questions_download'=>_x('Select Sample Questions Download',' import questions','wplms'), 
                'download_questions'=>_x('Download Questions',' import questions','wplms'), 
                'confirm_delete_quiz'=>_x('Do you want to delete this quiz?',' delete quiz','wplms'),
                'confirm_delete_assignment'=>_x('Do you want to delete this assignment?',' delete quiz','wplms'), 
                'switch_type'=>_x('Switch Type',' element action','wplms'),
                'edit'=>_x('Edit',' element action','wplms'),
                'delete'=>_x('Delete',' element action','wplms'),
                'remaining_retakes'=>_x('Remaining Course Retakes',' element action','wplms'),
                'ask_question'=>_x('Ask Question',' element action','wplms'),
                'question_prefix'=>_x('Q',' question prefix in quiz questions line','wplms'),
                'bulk_message_students'=>_x('Bulk message students',' bulk message students','wplms'),
                'send_message'=>_x('Send message',' bulk message students','wplms'),
                'select_members'=>_x('Action missing or members not selected.',' bulk action','wplms'),
                'message_length_error'=>_x('Subject and content length should be minimum 5','message error','wplms'),
                'message_subject'=>_x('Message subject.',' bulk action','wplms'),
                'message_content'=>_x('Message content.',' bulk action','wplms'),
                'all_students'=>_x('All Students',' bulk action','wplms'),
                'invalid_url' =>_x('Invalid Url',' bulk action','wplms'),
                'leave_rating'=>_x('Leave a rating',' bulk action','wplms'),
                'submit_review'=>_x('Submit review',' bulk action','wplms'),
                'question_full_prefix'=>_x('Question',' question prefix in quiz questions line','wplms'),
                'download_stats'=>_x('Download Statistics','manage questions','wplms'),
                'assign_student'=>_x('Assign Student','manage questions','wplms'),
            ),
        ));

        return $wplms_course_data;
    }
}

WPLMS_Course_Component_Init::init();


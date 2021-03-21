<?php
if ( ! defined( 'ABSPATH' ) ) exit;




if(!class_exists('WPLMS_Create_Course_Filters'))
{   
    class WPLMS_Create_Course_Filters{
    	
        public static $instance;
        public static function init(){
            if ( is_null( self::$instance ) )
                self::$instance = new WPLMS_Create_Course_Filters();
            return self::$instance;
        }

    	function __construct(){
           add_filter('wplms_get_element_settings',array($this,'wplms_get_element_settings'),10,3);
           add_filter('vibebp_finalise_upload_attachment_stream',array($this,'package_stream'),10,2);
           add_filter('wplms_course_creation_tabs',array($this,'check_groups_forums'));
		} 

        function check_groups_forums($tabs){
            if(!empty($tabs['course_components'])){
                foreach($tabs['course_components']['fields'] as $key=>$component){
                    if(!empty($component['id']) && $component['id'] == 'vibe_group'){
                        if(function_exists('bp_is_active') && !bp_is_active('groups')){
                            unset($tabs['course_components']['fields'][$key]);
                        }
                    }
                    if(!empty($component['id']) && $component['id'] == 'vibe_forum'){
                        if(!function_exists('bbpress')){
                             unset($tabs['course_components']['fields'][$key]);
                        }
                    }
                }

                $tabs['course_components']['fields']=array_values($tabs['course_components']['fields']);
            }

            if(count($tabs['course_components']['fields']) == 2){
                array_unshift($tabs['course_components']['fields'], array(
                    'label'=>__('No components active.','wplms')
                ));
            }
            return $tabs;
        }

        function wplms_get_element_settings($settings,$post_type,$post_id){
        	foreach ($settings as $key => $set) {
        		$settings[$key] = wplms_get_tab_values($set,$post_id);
        	}
            return $settings;
        }


        function package_stream($return,$file){

            if(empty($file['path']) || !strpos($file['path'], '.zip'))
                return $return;

            $wplmsthis = WPLMS_ZIP_UPLOAD_HANDLER::init();
            
            if(!empty($file['path'])){

                $fileName = basename($file['path']);
                $dir = explode(".",$fileName);
                $dir[0] = str_replace(" ","_",$dir[0]);
                $target = $wplmsthis->getUploadsPath().$dir[0];
                $index = count($dir) -1;

                if (!isset($dir[$index]) || $dir[$index] != "zip"){
                    unlink($file['path']);

                    return new WP_REST_Response(array('status'=>0,'message'=>__('The Upload file must be zip archive','wplms')), 200);
                }else{
                    while(file_exists($target)){
                        $r = rand(1,10);
                        $target .= $r;
                        $dir[0] .= $r;
                    }

                    if(empty($return)){$return = array();}
                    if (!empty($file['path'])){

                        $arr = $wplmsthis->extractZip($file['path'],$target,$dir[0]);

                        if($arr[0] != 'uploaded'){
                            $return['message']=$arr[0];
                            $wplmsthis->rrmdir($target);
                            unlink($file['path']);
                        }else{
                            $file['args']=json_decode($file['args'],true);
                            $return['status']=1;
                            $return['package']=array(
                                'package_type'=>(!empty($file['args']['package_type'])?$file['args']['package_type']:'1.2'),
                                'path'=>$arr[1],
                                'name'=>$arr[2],
                                'file'=>$arr[3]
                            );
                            $this->return = $return;
                            unlink($file['path']);
                        }
                    }else{
                        $return['message'] = __('File too big','wplms');
                    }
                }

            }else{
                $return=array('status'=> 0,'message'=>_x('File not found','wplms'));
            }
            $this->return = $return;
            add_filter('vibebp_upload_attachment_stream_message',array($this,'return_pacakge'));

            return 1;
        } 

        function return_pacakge($r){
            return $this->return;
        }
	}
	
}
WPLMS_Create_Course_Filters::init();
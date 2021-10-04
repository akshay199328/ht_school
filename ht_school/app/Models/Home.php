<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Home extends Model
{
    public static function checkemailcnt($data)
    {
      $results = DB::table('school')
      ->where('school_email_id', '=' , $data)->count();

      return $results;
    }

    public static function get_email_data($data)
    {
      $results = DB::table('school')->select('school_name', 'school_id' , 'school_email_id')
      		->where('school_email_id','=',$data)
      		->get();

      // echo "<pre>";print_r($school_users);exit;
      return $results;
    }

    public static function get_email_otp_data($data,$form_otp,$otp_ids)
    {
      $results = DB::table('school')->select('school_name', 'school_id' , 'school_email_id', 'otp_no')
          ->leftJoin('otp_table_school', 'school.school_id', '=', 'otp_table_school.otp_school_id')
      		->where('otp_id','=',$otp_ids)
          ->where('school_email_id','=',$data)
          ->where('otp_verified','=',0)
          ->where('otp_expired','=',0)
          ->orderBy('otp_id', 'desc')
      		->get();
      // echo "<pre>";print_r($results);exit;
      return $results;
    }

    public static function admincnt($email)
    {
      $results = DB::table('sys_users')->select('username', 'password')
          ->where('username','=',$email)
          ->where('status','=','Active')
          ->count();
      // echo "<pre>";print_r($results);exit;
      return $results;
    }

    public static function get_user($email)
    {
      $results = DB::table('sys_users')->select('username', 'password','id','user_type')
          ->where('username','=',$email)
          ->where('status','=','Active')
          ->get();
      // echo "<pre>";print_r($results);exit;
      return $results;
    }

    public static function get_email_data_otp($email)
    {
        $results = DB::table('otp_table_school')->select('otp_email','otp_no','otp_verified')
            ->where('otp_email','=',$email)
            ->where('otp_verified','=',0)
            ->where('otp_expired','=',0)
            ->orderBy('otp_id', 'desc')
            ->get();
        // echo "<pre>";print_r($results);exit;
        return $results;
    }

    public static function get_school_data($state_id , $district = null, $school_name = null,$state_name)
    {
      $subsql = "";
      // echo "<pre>";print_r($state_name);exit;
      if(isset($state_id) && $state_id != "")
      {
        if($state_id == ' ')
        {

        }
        elseif($state_id == 0)
        {

        }
        else
        {
          $subsql .= "AND school_state IN (".$state_id.")";
        }
      }

      if(isset($district) && $district != "")
      {
        if($district == ' ')
        {

        }
        else
        {
          
          $subsql .= " AND school_district like '%".$district."%'";
        }
      }

      if(isset($school_name) && $school_name != "")
      {
        if($school_name == ' ')
        {

        }
        else
        {
          $subsql .= " AND school_name like '%".$school_name."%'";
        }
      }
      if($state_name != '')
      {
        $results = DB::select("SELECT 
                              school_id,school_name
                              FROM school
                              WHERE 1 $subsql");
      }
      else
      {
        $results = array();
      }
      // echo "<pre>";print_r($results);exit;
      return $results;
    }

    public static function get_state_id($state)
    {
      $results = DB::table('state_master')->select('state_id', 'state_name')
          ->where('state_name', 'like', '%' . $state . '%')
          ->get();
      //echo "<pre>";print_r($results);exit;
      return $results;
    }

}
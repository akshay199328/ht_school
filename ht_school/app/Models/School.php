<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class School extends Model
{
    Use HasFactory;

    protected $table = 'school';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'school_name',
        'school_address',
        'school_district',
        'school_state',
        'school_email_id',
        'status',
        'created_date',
        'created_by',
        'modified_date',
        'modified_by'
    ];

    public static function get_state_data($state_name)
    {
      $results = DB::table('state_master')->select('state_name', 'state_id')
            ->where('state_name', 'like', '%' . $state_name . '%')
            ->get();
      // echo "<pre>";print_r($results);exit;
      return $results;
    }

    public static function get_school_data($school_id)
    {
      $results = DB::table('school')->select('*')
            ->where('school_id',$school_id)
            ->get();
      // echo "<pre>";print_r(json_encode($results));exit;
      return $results;
    }

    public static function schoolname_count($school_name,$school_id)
    {
      $results = DB::table('school')
      ->where('school_name', '=' , $school_name)
      ->where('school_id', '!=' , $school_id)
      ->count();

      return $results;
    }
}

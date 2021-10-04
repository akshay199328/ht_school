<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Session;
use Hash;

class SchoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function school_list(Request $request)
    {
        $data = ['LoggedUserInfo'=>School::where('school_email_id','=', session::get('email'))->first()];
        if(!empty($data['LoggedUserInfo']))
        {
          return back();
        }
        else
        {
          if(session()->has('email'))
          {
              $schoolData = DB::table('school')->where('status',1)->paginate(15);

              return view('schools.school_list_view',compact('schoolData'))->with('i', ($request->input('page', 1) - 1) * 15);
          }
          else
          {
              return redirect('/auth/admin_login');
          }
        }
    }

    public function school_edit($id)
    {
        $data = ['LoggedUserInfo'=>School::where('school_email_id','=', session::get('email'))->first()];
        if(!empty($data['LoggedUserInfo']))
        {
          return back();
        }
        else
        {
          if(session()->has('email'))
          {
              $school_id       = decrypt($id);
              if (!empty($school_id)) 
              {
                  $states      = DB::table('state_master')->get();
                  $school_data = School::get_school_data($school_id);

                  return view('schools.school_form')->with(['states' => $states,'school_data' => $school_data]);
              } 
              else 
              {
                  return view('errors.error');
              }
          }
          else
          {
              return redirect('/auth/admin_login');
          }
        }
    }

    public function encrypt()
    {
        $encrypted = Crypt::encryptString();
        return $encrypted;
    }

    public function decrypt()
    {
        $decrypted = Crypt::decryptString();
        return $decrypted; 
    }

    public function update_school(Request $request,$id)
    {
        $school_id   = decrypt($id);
        $school_data = array();
        if($school_id != 0)
        {
            $schoolname_count = School::schoolname_count(rtrim($request->input('school_name')),$school_id);

            if($schoolname_count != 0)
            {
                return back()->withErrors('School Name Already Exists!');
            }
            else
            {
                $school_name     = $request->input('school_name');
                $school_state    = $request->input('school_state');
                $school_district = $request->input('school_district');
                $school_address  = $request->input('school_address');
                $school_email_id = $request->input('school_email_id');
                $status          = $request->input('status');

                $school_data =  [ 
                            'school_id'       => $school_id,
                            'school_name'     => isset($school_name) ? 
                            $school_name : '',
                            'school_state'    => isset($school_state) ? $school_state : '',
                            'school_district' => isset($school_district) ? $school_district : '',
                            'school_address'  => isset($school_address) ? $school_address  : '',
                            'school_email_id' => isset($school_email_id) ? $school_email_id : '',
                            'status'          => isset($status) ? $status : '',
                          ];

                DB::table('school')->where('school_id',$school_id)->update($school_data);

                return redirect('school_edit/'.$id)->withStatus('Data Updated Successfully');
            }
        }
    }
}

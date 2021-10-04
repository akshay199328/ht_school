<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use DB;

class HomeController extends Controller
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
    function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $email_ids   = $request->email;

        $email_count = Home::checkemailcnt($email_ids);

        // echo "<pre>";print_r($request->all());exit;

        if($email_count != 0)
        {
            $get_email_data= Home::get_email_data($email_ids);
            $result        = json_decode(json_encode($get_email_data, true));

            $request->session()->put('email',$result[0]->school_email_id);
            $request->session()->put('token',$request->_token);
            $request->session()->put('school_name',$result[0]->school_name);
            $request->session()->put('school_id',$result[0]->school_id);

            $info_email  = $request->session()->get('email');
            $school_name = $request->session()->get('school_name');
            $school_id   = $request->session()->get('school_id');
            $tokens      = $request->session()->get('token');

            if($info_email == $email_ids)
            {
                $msg = "<b>"."A One-Time Passcode (OTP) has been sent to ".$info_email.". Please enter the OTP to verify your email"." address."."</b>";

                $otp  = random_int(100000, 999999);

                $to_name  = $result[0]->school_name;
                $to_email = $info_email;
                $data = array('body' => "Your One-Time Passcode (OTP)",'otp' => $otp);
                Mail::send('dynamic_email_template',$data,function($message) use ($to_name,$to_email)
                {
                    $message->to($to_email)
                    ->subject('One-Time Passcode (OTP)');
                });

                $rslt = DB::table('otp_table_school')->insertGetId(
                    ['otp_email' => $info_email, 'otp_no' => $otp,'otp_school_id' => $school_id,'otp_verified' => 0,'otp_expired' => 0]
                );
                $result                 = array();
                $result['resp']         = 1;
                $result['otp_id']       = $rslt;
                $result['message']      = nl2br($msg);
                $result['school_id']    = $school_id;
                $result['school_name']  = $school_name;
                $result['email']        = $info_email;

                // echo "<pre>";print_r($result);exit;
                echo json_encode($result);
            }
        }
        else
        {
           $result         = array();
           $result['resp'] = 2;
           echo json_encode($result); 
        }
    }

    public function postVerify(Request $request)
    {
        $email_ids               = $request->email;
        $show_otp_expired_status = isset($request->show_otp_status) ? $request->show_otp_status : '';
        $otp_ids                 = $request->show_otp_id;

        if($show_otp_expired_status == 1)
        {
            DB::table('otp_table_school')->where('otp_id', $otp_ids)->update(array('otp_verified' => 0,'otp_expired' => 1));
            $result         = array();
            $result['resp'] = 3;
            echo json_encode($result); 
        }
        else
        {
            $first  = isset($request->num_1) ? $request->num_1 : '';
            $second = isset($request->num_2) ? $request->num_2 : '';
            $third  = isset($request->num_3) ? $request->num_3 : '';
            $fourth = isset($request->num_4) ? $request->num_4 : '';
            $fifth  = isset($request->num_5) ? $request->num_5 : '';
            $sixth  = isset($request->num_6) ? $request->num_6 : '';

            $form_otp = $first.''.$second.''.$third.''.$fourth.''.$fifth.''.$sixth;

            $email_otp_data = Home::get_email_otp_data($email_ids,$form_otp,$otp_ids);
            $result_data    = json_decode(json_encode($email_otp_data, true));

            if($result_data[0]->otp_no == $form_otp)
            {
                $get_email_data= Home::get_email_data($email_ids);
                $result        = json_decode(json_encode($get_email_data, true));

                $request->session()->put('email',$result[0]->school_email_id);
                $request->session()->put('token',$request->_token);
                $request->session()->put('school_name',$result[0]->school_name);
                $request->session()->put('school_id',$result[0]->school_id);
                $request->session()->put('otp_no',$form_otp);

                $info_email  = $request->session()->get('email');
                $school_name = $request->session()->get('school_name');
                $school_id   = $request->session()->get('school_id');
                $tokens      = $request->session()->get('token');
                $otp_nos     = $request->session()->get('otp_no');

                if($info_email == $email_ids)
                {
                    $to_name  = $result[0]->school_name;
                    $to_email = $info_email;
                    $data = array('body' => "Your One-Time Passcode (OTP)",'otp' => $otp_nos);
                    Mail::send('dynamic_email_template',$data,function($message) use ($to_name,$to_email)
                    {
                        $message->to($to_email)
                        ->subject('One-Time Passcode (OTP)');
                    });
                    
                    DB::table('otp_table_school')->where('otp_id', $otp_ids)->update(array('otp_verified' => 1));

                    $result                 = array();
                    $result['resp']         = 1;
                    $result['school_id']    = $school_id;
                    $result['school_name']  = $school_name;
                    $result['email']        = $info_email;
                    $result['otp_nos']      = $otp_nos;
                    // echo "<pre>";print_r($result);exit;
                    echo json_encode($result);
                }
            }
            else
            {
               $result         = array();
               $result['resp'] = 2;
               echo json_encode($result); 
            }
        }
    }

    function dashboard(){
        // echo "<pre>";print_r(session::all());exit;
        $data = ['LoggedUserInfo'=>School::where('school_email_id','=', session::get('email'))->first()];
        if(!empty($data['LoggedUserInfo']))
        {
            if(session()->has('email'))
            {
                return view('layouts.dashboard',$data);
            }
            else
            {
                return redirect('/auth/login');
            }
        }
        else
        {
            return redirect('admin-dashboard');
        }
    }

    function logout(){
        if(session()->has('email')){
            Session::forget('email');
            Session::flush();
            return redirect('/auth/login');
        }
        else
        {
            return redirect('/auth/login');
        }
    }

    function admin(){
            return view('auth.admin');
        }

    public function adminLogin(Request $request)
    {
        $cnt = Home::admincnt($request->email);

        if($cnt != 0)
        {
            $record = Home::get_user($request->email);

            if($record[0]->password == $request->password)
            {
                $request->session()->put('email',$request->email);
                $request->session()->put('id',$record[0]->id);
                $request->session()->put('token',$request->_token);
                $request->session()->put('user_type',$record[0]->user_type);

                $admin_email  = $request->session()->get('email');
                $admin_id     = $request->session()->get('id');
                $user_type    = $request->session()->get('user_type');

                $result              = array();
                $result['resp']      = 1;
                $result['email']     = $admin_email;
                $result['id']        = $admin_id;
                $result['user_type'] = $user_type;

                echo json_encode($result);
            }
            else
            {
                $result = array();
                $result['resp'] = 2;
                echo json_encode($result);
            }
        }
        else
        {
            $result = array();
            $result['resp'] = 3;
            echo json_encode($result);
        }
    }

    function admin_dashboard(){
      $data = ['LoggedUserInfo'=>School::where('school_email_id','=', session::get('email'))->first()];
      if(!empty($data['LoggedUserInfo']))
      {
        return redirect('dashboard');
      }
      else
      {
        if(session()->has('email'))
        {
            return view('layouts.admin_dashboard', $data);
        }
        else
        {
            return redirect('/auth/admin_login');
        }
      }
    }

    function admin_logout(){
        if(session()->has('email')){
            Session::forget('email');
            Session::flush();
            return redirect('/auth/admin_login');
        }
        else
        {
            return redirect('/auth/admin_login');
        }
    }

    public function search_school($state_name=null, $district = null, $school_name = null)
    {
        if($district == ' ' || !$district)
        {
            $district = '';
        }
        
        if($school_name == ' ' || !$school_name)
        {
            $school_name = '';
        }
        
        if($state_name == ' ' || !$state_name)
        {
            $state_name = '';
        }

        if(empty($state_name))
        {
            $state_id = Home::get_state_id($state_name);
            $sta_id   = json_decode(json_encode($state_id, true));
            $myArray  = array();
            foreach ($sta_id as $s){ 
                $myArray[] = $s->state_id;
            }
            $id          = implode( ', ', $myArray );
            $school_data = Home::get_school_data($id,$district,$school_name,$state_name);
            return response()->json(['school' => $school_data,'message'=>'Please Select State'], 404);
        }
        else
        {
            $state_id = Home::get_state_id($state_name);
            $sta_id   = json_decode(json_encode($state_id, true));
            $myArray  = array();
            foreach ($sta_id as $s){ 
                $myArray[] = $s->state_id;
            }
            $id          = implode( ', ', $myArray );
            $school_data = Home::get_school_data($id,$district,$school_name,$state_name);
            return response()->json(['school' => $school_data], 200);
        }
    }
}

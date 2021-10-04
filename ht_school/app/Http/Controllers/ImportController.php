<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\SchoolImport;
Use App\Models\School;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;

class ImportController extends Controller
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
    public function import_add(Request $request)
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
              return view('import.import_add');
          }
          else
          {
              return redirect('/auth/admin_login');
          }
        }
    }

    public function fileUpload(Request $req){
        $file = $req->file('file_import');

        if(empty($file))
        {      
        	return back()->withErrors('Please Upload a file of xlsx format');
        }
        else
        {
        	(new SchoolImport)->import($file);
        	           
        	return back()->withStatus('Excel file imported Successfully');
        }
   	}

}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;
use Hash;

class UserController extends Controller
{
    protected $users;
    /**
     * Create a new controller instance.
     * @return void
     */
    /**
    * Show the application dashboard.
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
    	if (false == Auth::check()) 
    	{
            return redirect('logout');
        }
        else
        {
        	return view('dashboard');
        }
    }
    
    public function user_list()
    {
    	if (false == Auth::check()) {
            return redirect('logout');
        }
        $users_array = DB::table('users')->get();
        return view('user.user_list_view',['users' => $users_array]);
    }
}

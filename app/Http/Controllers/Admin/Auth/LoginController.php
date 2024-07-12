<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';



    public function showLoginForm()
    {
        return view('admin.auth.login');
    }





    public function login(Request $request)
    { 
       //return $request->all();
        $request->validate([
            'password' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $remember_me = $request->has('remember_me') ? true : false; 

        if($this->guard()->attempt(['email' => request('email'), 'password' => request('password'),'status' => 1], $remember_me)) {
        $admin =  Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard.index')->with(['class'=>'success','message'=>'Logedin Successfully.']);
        } 

        if ($admin = Admin::where('email',$request->email)->first()) {
            if ($admin->status == 0) {
                return redirect()->back()->with(['class'=>'error','message'=>'You are not an active person, please contact with Owner.']);
            }        
        }  
        return redirect()->back()->with(['class'=>'error','message'=>'These credentials do not match our records.']);
        
        
    }



    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login.form');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('admin.guest', ['except' => 'logout']);
    // }


    protected function guard()
    {
        return Auth::guard('admin');
    }

}

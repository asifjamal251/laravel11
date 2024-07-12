<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null) {

        return view('admin.auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    public function newPasswordForm(Request $request, $id) {
        $idmy = Crypt::decrypt($request->id);
        if($admin = Admin::where(['id'=>$idmy, 'password'=>Null])->select('email','id')->first()){
            return view('admin.auth.passwords.new',compact('admin','id'));
        }
        return redirect()->back()->withErrors(['email'=>'You have already set yout password']);

        
    }

    public function sepPassword(Request $request, $id){

        $this->validate($request,[
            'password' => 'required|string|min:6|confirmed'

        ]);
        
            $idmy = Crypt::decrypt($request->id);
            if(Admin::where(['id'=>$idmy, 'password'=>Null])->first()){
                $admin = Admin::firstOrNew(['id'=>$idmy, 'password'=>Null]);
                $admin->password = bcrypt($request->password);
                $admin->status = 1;
                if($admin->save()){
                    auth('admin')->login($admin);
                    return redirect()->route('admin.login.form');
                }
                return redirect()->back()->with(['email'=>'Your new password something wrong']);
            }

            return redirect()->back()->withErrors(['email'=>'You have already set yout password']);

        
    }


    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('admin');
    }
}
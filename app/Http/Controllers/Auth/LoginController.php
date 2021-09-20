<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {

        // if( $this->middleware('auth')){
        //     return view('settings.level');
        // }

        return view('auth.login');
    }
    public function Login(Request $request)
    {

        //dd('hi');
        $rules = array(
            'email' =>'required|email|unique:users',
            'password' => 'required|min:4'
        );
        $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );

        if(Auth::attempt($userdata)) {
            return \Redirect::to('level');
            // echo 'Success';
        } else {
        //  echo 'Faild';
         return \Redirect::to('login-fail');
        }
        // $validator = Validator::make($request->all(), $rules);

        // if($validator->fails()) {
        // //  echo 'Faild';
        //     return \Redirect::to('login-fail')
        //     ->withErrors($validator)
        //     ;
        // } else {

        // }
    }
    public function signout()
    {
          dd('www');
         Auth::logout();

         return \Redirect::to('');

    }
}

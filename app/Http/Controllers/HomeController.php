<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    use AuthenticatesUsers;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('');
    }

    public function doLogin()
    {
        dd('hi');
        $rules = array(
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {
        //  echo 'Faild';
            return \Redirect::to('log-in')
            ->withErrors($validator)
            ->withInput(Input::excet('password'));
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if(Auth::attempt($userdata)) {
                return \Redirect::to('home');
                // echo 'Success';
            } else {
            //  echo 'Faild';
             return \Redirect::to('log-in');
            }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return \Redirect::to('log-in');
    }

}

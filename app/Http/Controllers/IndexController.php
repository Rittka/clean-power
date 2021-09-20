<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
                //start session
if( $this->middleware('auth')){
    return view('settings.level');
}
        return view('auth.login');
    }
}

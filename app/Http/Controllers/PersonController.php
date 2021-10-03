<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{

    public function create(){


        return view('person.create');
    }

    public function store(Request $request){

        Person::create($request->all());
        return redirect('/person');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Yajra\Datatables\Datatables;

class PersonController extends Controller
{

    public function create(){


        return view('person.create');
    }

    public function store(Request $request){

        Person::create($request->all());
        return redirect('/person');
    }
    //
    //
   

}

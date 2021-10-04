<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Yajra\Datatables\Datatables;

class PersonController extends Controller
{

    public function index(){


        return view('person.index');
    }

    public function personDatatable(){
        $people = Person::all();
        return Datatables::of($people)
        ->addColumn('person_type', function($col){
            if($col->type == 1)
            return "موّرد";
            else
            return "زبون";
        })->make(true);
    }

    public function edit($id){

        $person = Person::find($id);
        return view('person.edit',compact('person'));
    }

   public function update(Request $request , $id){
        $person = Person::find($id);
        $person->update($request->all());
        return redirect('/person');

    }


    public function show($id){
        $person = Person::find($id);

        return view('person.show', compact(['person']));
    }

    public function create(){


        return view('person.create');
    }

    public function store(Request $request){

        Person::create($request->all());
        return redirect('/person');
    }
    //
    //
   



    public function destroy($id){
        $person = Person::find($id);
        $person->delete();
        return redirect('person');


    }

}

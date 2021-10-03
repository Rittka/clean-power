<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Staff;
use App\Person;
use App\Equipment;

class ProjectController extends Controller
{
    public $data = [];
    public function create(){

        $data['regions'] = Region::all();
        $data['staffs'] = Staff::all();
        $data['customers'] = Person::where('type' , 2)->get();
        $data['equipments'] = Equipment::where('quantity' , '>' , 0)->get();

        return view('project.create' , $data);
    }
    public function index(){
        return view('project.index');
    }
    public function edit(){
        return view('project.edit');
    }
    public function show(){
        return view('project.show');
    }
    public function store(Request $request){

        dd($request->all());
        return view('project.edit');
    }

}

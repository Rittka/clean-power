<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Staff;
use App\Person;
use App\Equipment;
use Yajra\Datatables\Datatables;

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

        $project = Project::create([
            'customer_id' => $request->customer_id ,
            'region_id' => $request->region_id,
        ]);


        return view('project.edit');
    }
    public function createtower(){
        return view('project.createTower');
    }
    public function createcustomer(){
        return view('person.create');
    }
    public function createregion(){
        return view('region.create');
    }
}

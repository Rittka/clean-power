<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Staff;
use App\Person;
use App\Project;
use App\Equipment;
use App\Staff_project;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    public $data = [];
    public function create(){

        $data['regions'] = Region::all();
        $data['staffs'] = Staff::all();
        $data['customers'] = Person::where('type' , 2)->get();


        return view('project.create' , $data);
    }
    public function index(){
        return view('project.index');
    }
    public function edit($id){
        $data['project'] = Project::find($id);
        $data['regions'] = Region::all();
        $data['staffs'] = Staff::all();
        $data['customers'] = Person::where('type' , 2)->get();
        return view('project.edit' , $data);
    }
    public function show(){
        return view('project.show');
    }
    public function store(Request $request){

        $project = Project::create($request->all());
        foreach($request->staffs_ids as $staff){
            Staff_project::create([
                'project_id' => $project->id ,
                'employee_id' => $staff
            ]);

        }
        return redirect('/project');
    }
    public function update(Request $request,$id){
        Staff_project::where('project_id' , $id)->delete();
        $project = Project::find($id);


        $project->update($request->all());

        foreach($request->staffs_ids as $staff){
            Staff_project::create([
                'project_id' => $project->id ,
                'employee_id' => $staff
            ]);

        }
        return redirect('/project');
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

    public function projectDatatable(){
        $projects = Project::all();

        return Datatables::of($projects)
        ->addColumn('customer_name', function($col){
            return $col->person->fullname ;
         })
        ->addColumn('location', function($col){
           return $col->region->name ;
        })
        ->addColumn('type', function($col){
            return "إنارة " . $col->genre ;
         })
        ->make(true);
    }
}

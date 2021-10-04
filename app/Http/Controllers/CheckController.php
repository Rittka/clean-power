<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Check;
use App\Staff;
use App\Staff_check;
use App\Project;
use Yajra\Datatables\Datatables;

class CheckController extends Controller
{

    public function index(){


        return view('check.index');
    }

    public function checkDatatable(){
        $checks = Check::all();
        return Datatables::of($checks)
        ->addColumn('project_name', function($col){
            return $col->project->name ;
         })
        ->addColumn('location', function($col){
           return $col->project->region->name ;
        })
        ->make(true);
    }

    public function edit($id){

        $check = Check::find($id);
        $staffs = Staff::all();
        $projects = Project::all();
        return view('check.edit',compact(['check','staffs' , 'projects']));
    }

   public function update(Request $request , $id){
        Staff_check::where('check_id' , $id)->delete();
        $check = Check::find($id);
        $check->update($request->all());
        foreach($request->staffs as $staff){
            Staff_check::create([
                'staff_id' => $staff ,
                'check_id' => $check->id ,
                ]);
        }
        return redirect('/check');

    }


    public function show($id){
        $check = Check::find($id);

        return view('check.show', compact(['check']));
    }

    public function create(){

        $staffs = Staff::all();
        $projects = Project::all();


        return view('check.create',compact(['staffs' , 'projects']));
    }

    public function store(Request $request){

        $check = Check::create([
            'project_id' => $request->project_id ,
            'remarks' => $request->remarks ,
            'date_of_check' => $request->date_of_check
        ]);
        foreach($request->staffs as $staff){
            Staff_check::create([
                'staff_id' => $staff ,
                'check_id' => $check->id ,
                ]);
        }
        return redirect('/check');
    }



    public function destroy($id){
        Staff_check::where('check_id' , $id)->delete();
        $check = Check::find($id);
        $check->delete();
        return redirect('check');


    }

}

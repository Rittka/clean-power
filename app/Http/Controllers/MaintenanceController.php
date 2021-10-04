<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Maintenance;
use App\Staff_maintenance;
use App\Notworking_equipment;

use App\Project;
use Yajra\Datatables\Datatables;

class MaintenanceController extends Controller
{
    //
    public function index(){
        return view('maintenance.index');
    }
    public function edit(){
        return view('maintenance.edit');
    }
    public function show(){
        return view('maintenance.show');
    }
    public function create(){


        $staffs = Staff::all();
        $projects = Project::all();


        return view('maintenance.create',compact(['staffs' , 'projects']));
    }

    public function store(Request $request){

        $maintenance = Maintenance::create([
            'project_id' => $request->project_id ,
            'remarks' => $request->remarks ,
            'date_of_maintenance' => $request->date_of_maintenance
        ]);
        foreach($request->staffs as $staff){
            Staff_maintenance::create([
                'employee_id' => $staff ,
                'maintenance_id' => $maintenance->id ,
                'date_of_maintenance' =>$request->date_of_maintenance
                ]);
        }
        return redirect('/maintenance');
    }

    public function update(Request $request , $id){
        Staff_maintenance::where('maintenance_id' , $id)->delete();
        $check = Maintenance::find($id);
        $check->update($request->all());
        foreach($request->staffs as $staff){
            Staff_maintenance::create([
                'employee_id' => $staff ,
                'maintenance_id' => $maintenance->id ,
                'date_of_maintenance' =>$request->date_of_maintenance
                ]);
        }
        return redirect('/maintenance');

    }

    public function maintenanceDatatable(){
        $mains = Maintenance::all();
        return Datatables::of($mains)
        ->addColumn('project_name', function($col){
            return $col->project->name ;
         })
        ->addColumn('location', function($col){
           return $col->project->region->name ;
        })
        ->make(true);
    }

    public function destroy($id){
        Staff_maintenance::where('maintenance_id' , $id)->delete();
        $check = Maintenance::find($id);
        $check->delete();
        return redirect('maintenance');


    }
    public function createNotWork_equip(){
        return view('maintenance.createNotWorking_equipment');
    }
}

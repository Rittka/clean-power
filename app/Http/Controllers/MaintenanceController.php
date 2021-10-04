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
    public function createNotWork_equip(){
        return view('maintenance.createNotWorking_equipment');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Check;
use App\Staff_check;
use App\Project;
use App\Models\Student;
use Yajra\Datatables\Datatables;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

      $checks = Check::all();

        return view( 'section.index',compact('checks'));
    }

    public function create() {

        $staffs = Staff::all();
        $projects = Project::all();


        return view( 'section.create' , compact(['staffs', 'projects']) );}




    public function store( Request $request ) {


       $check =  Check::create([
            'project_id' => $request->project_id ,
            'dateofcheck' => $request->date_of_check,
            'remark' => $request->note
        ]);
        foreach($request->staffs as $staff){
            Staff_check::create([

                'check_id' => $check->id ,
                'staff_id' => $staff

            ]);
        }
    }

      


    
    }











    
   


 

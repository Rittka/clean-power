<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Models\Position;
use App\Models\PositionStaff;
use Yajra\Datatables\Datatables;
use App\Models\VisitGroup;
use App\Models\TimeSchedule;
use App\Models\GroupStaff;
use App\Models\PositionType;
use Illuminate\Support\Facades\Auth;


class StaffController extends Controller
{

    public function index() {
        return view('staff.index');
    }

    public function staffDatatable(){
        $staffs = Staff::all();
        return Datatables::of($staffs)->make(true);
    }


    public function create(){


              return view('staff.create');
    }



    public function store(Request $request){
        Staff::create($request->all());
        return redirect('staff');
    }


    public function show($id){
        $staff = Staff::find($id);

        return view('staff.show', compact(['staff']));
    }


    public function edit(Staff $staff) {


        return view('staff.edit', compact('staff'));
    }




    public function update(Staff $staff,Request $request){


        $staff->update($request->all());

        return redirect('staff');
    }


    public function destroy($id){
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('staff');


    }

   
}

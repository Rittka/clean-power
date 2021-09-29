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





        return redirect( 'section' );
    }

    public function showStudents($id){
        $section = Section::find($id);

        $sections_of_level = Section::where( 'level_id', $section->level_id )->get();

        return view('section.showStudents',compact('section','sections_of_level'));
    }


    public function StudentSectionDtatatable(Request $request) {


        $students = StudentSection::where('section_id',$request['id'])->with('marks')->get();

        return Datatables::of($students)->addColumn('first_name', function($col){
            return $col->student->first_name;
        })->addColumn('last_name', function($col){
            return $col->student->last_name;
        })->addColumn('mark', function($col){
            return "0";
        })->addColumn('excused', function($col){
            return "0";
        })->addColumn('unexcused', function($col){
            return "0";
        })->make(true);
    }


    public function showTeachers($id){
        return view('section.showTeachers',compact('id'));
    }

    public function TeacherSectionDtatatable(Request $request) {


        $teachers = Teacher::where('section_id',$request['id'])->get();

        return Datatables::of($teachers)->addColumn('full_name', function($col){
            return $col->position->staff->full_name;
        })->addColumn('subject', function($col){
            return $col->subject->name;
        })->make(true);
    }


    public function edit( $id ) { //edit section view
        $user = Auth::user();
        if($user->hasPermission('Employee Managemment'))
       { $levels = Level::all();
        $section =Section::find($id);
        return view( 'section.edit', compact( ['section','levels'] ) );}
        else return response()->json('this user doesnt have edit section permission');
    }



    public function update( Request $request,$id ) {
       $old_section = Section::find($id);
       $old_section->delete();
       $level_id = $request->input( 'level' );
       $section = Section::where( 'level_id', $level_id )->max( 'name' ) + 1;
       $year = $request->input('year');
       Section::create( [
           'name' => $section,
           'level_id' => $level_id,
           'year' => $year,
       ] );
        return redirect( 'section' );
    }
    public function move( Request $request,$id ) { //move student from section to another
        $user = Auth::user();
        if($user->hasPermission('Student Managemment'))
        {$oldsection_id = $request->input( 'old_id' );
        $section_id = $request->input( 'new_id' );
        $student_id = $request->input( 'studnet_id' );
        $StudentSection = StudentSection::where( 'student_id', $student_id)
        ->where( 'section_id', $oldsection_id   )
        ->first();

        $payment = $StudentSection->payment;

        $StudentSection->delete();

        StudentSection::create( [
            'student_id' => $student_id,
            'section_id' => $section_id,
            'payment' => $payment,
        ] );
         return redirect( 'section' );}
         else return response()->json('this user doesnt have move a student to another section permission');
     }


    public function destroy( $id ) {
        $user = Auth::user();
        if($user->hasPermission('Employee Managemment')){
        $section =Section::find($id);
        $section->delete();
         return redirect('section');}

        else  return response()->json('this user doesnt have delete section permission');
    }
}

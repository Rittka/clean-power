<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentSection;
use App\Models\Section;
use App\Models\StudentSectionPayment;
use App\Models\StudentSectionAbsence;
use App\Models\StudentSectionMark;
use App\Models\Level;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Auth;
// use Validator;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      return view('student.index');
    }

    public function studentDatatable(){
        $students = Student::all();
        return Datatables::of($students)->make(true);
    }

    public function create(){


        return view('student.create');
    }


    public function store(CreateStudentRequest $request){



        return redirect('student');

    }


    public function show($id){



        return view('student.show',compact(['student','student_section',]));
    }

    public function edit(Student $student){
        $user = Auth::user();

         return view('student.edit',compact(['student','levels','student_section']));

    }

    public function update(UpdateStudentRequest $request, $id){
        //return response()->json($request);

        $id = (int)$id;
         $student = Student::find($id);
        // return response()->json($student);
         $student_personal_data = $request->except(['section_id','payment']);
         $student->update($student_personal_data);
         $student_section = StudentSection::where('student_id',$id)->orderBy('id','desc')->first();
        // return response()->json($student_section);
         $student_section_info = $request->only('section_id','payment');;
        // return response()->json($student_section_info);
         $student_section->update($student_section_info);

        //  dd($updated_student = Student::find($id)->with('sections')->get());

        return redirect('student');



    }

    public function destroy($id){

        return redirect('student');

    }

    public function editPayment(Request $request, $id){

        return response()->json($student_payment);

    }

    public function addAbsence(Request $request){


        return redirect('section');



    }

    public function editAbsence(Request $request, $id){

       

    }

    public function addMark(Request $request,$id){


        return redirect('section');

    }

    public function studentMarksDatatable(Request $request){

        $marks = StudentSectionMark::where('student_section_id',$request['id'])->get();
        return Datatables::of($marks)->addColumn('subject_name',function($col){
            return $col->subject->name;
        })->make(true);
    }

    public function editMark(Request $request , $id){
        $user = Auth::user();
        if($user->hasPermission('Student Managemment'))
        {$mark = StudentSectionMark::find($id);
        $validatedData = $request->validate([
            'semester' => 'string' ,
            'caption' => 'string' ,
            'mark' => 'numeric'
        ]);
       // return response($validatedData['mark']);
        $mark->update([ 'mark' => $validatedData['mark'] ,
        'caption' => $validatedData['caption'],
        'semester' => $validatedData['semester']]);
        return response()->json($mark);}
    }

    public function deleteMark($id){
        $mark = StudentSectionMark::find($id);
        $mark->delete();
        return response()->json('true', 200);
    }

  public function  addStudentMarksDatatable(Request $request){
    $students = StudentSection::where('section_id',$request['id'])->with('marks')->get();
    return Datatables::of($students)->addColumn('first_name', function($col){
        return $col->student->first_name;
    })->addColumn('last_name', function($col){
        return $col->student->last_name;
    })->addColumn('mark', function($col){
        return "0";
    })->make(true);
  }

  public function showAddMark($id){
      $section = Section::find($id);
      return view('student.addMarks', compact('section'));
    }

 public function showAddPayment($id){
    $section = Section::find($id);
        return view('student.addPayment', compact('section'));
 }


  public function  addStudentPaymentsDatatable(Request $request){
      $section_id = $request['id'];


     $students = StudentSection::where('section_id',$section_id)->with(['payments'=> function ($query){
        $query->orderBy('id','desc');}])->get();

      return Datatables::of($students)->addColumn('first_name', function($col){
        return $col->student->first_name;})->
        addColumn('last_name', function($col){
        return $col->student->last_name;})
        ->addColumn('month', function($col){

            if(sizeof($col->payments)  !=0){
                $current_month = $col->payments->first()->month;
                if($current_month == 12){
                        return "1"; }
                else return  $current_month + 1;
            }

            else return "0";

        })->addColumn('amount', function($col){
        return $col->payment;})->addColumn('receiver', function($col){
        return "0";})->make(true);
  }

  public function addPayment(Request $request){
    $validatedData = $request->validate([
    'month' => 'required|array',
    'month.*' => 'numeric',
    'amount' => 'required|array',
    'amount.*' => 'numeric',
    'receiver' => 'required|array',
    'receiver.*' => 'string',

    ]);
    $month = $validatedData['month'];
    $amount = $validatedData['amount'];
    $receiver = $validatedData['receiver'];
    foreach($amount as $key => $payment){
        $student = StudentSection::find($key);
        $real_payment = $student->payment;
        if($real_payment == $payment && $month[$key] != 0  && $receiver[$key] != "0"){
        StudentSectionPayment::create([
            'student_section_id' => $key,
            'month' => $month[$key],
            'amount' => $amount[$key],
            'receiver' => $receiver[$key]
        ]);
        }
    }

    return redirect('section');


}

  public function  addStudentAbsencesDatatable(Request $request){
    $students = StudentSection::where('section_id',$request['id'])->with('absences')->get();
    return Datatables::of($students)->addColumn('first_name', function($col){
        return $col->student->first_name;
    })->addColumn('last_name', function($col){
        return $col->student->last_name;
    })->addColumn('excused', function($col){
        return "0";
    })->addColumn('unexcused', function($col){
        return "0";
    })->make(true);
  }
  public function showAddAbsence($id){
      $section = Section::find($id);

    return view('student.addAbsences', compact('section'));

  }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Position;
use App\Models\PositionStaff;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\TeacherSignature;
use Yajra\Datatables\Datatables;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with(['section','section.level','subject'])->get();
       //  dd($teachers);
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = PositionStaff::whereIn('position_id', [10,11,12,13,14])->get();
       $levels = Level::all();

        return view('teacher.create',compact(['teachers','levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {  // $staff_id = $request->input('position_staff_id');
        $subject_id = $request->input('subject_id');
        $section_id = $request->input('section_id');

        $validatedData = $request->validate([
            'position_staff_id' => 'required|numeric|unique:teachers,position_staff_id,NULL,NULL,subject_id,'.$subject_id.',section_id,'. $section_id ,
            'subject_id' => 'required|numeric',
            'section_id' => 'required|numeric'
        ]);
       Teacher::create($validatedData);
        return redirect('teacher');

    }

    public function getSectionsOfLevel($id){
        $sections = Section::where('level_id',$id)->get();
        $html = '';
        foreach($sections as $section){
          $html .= "<option value=".$section->id.">".$section->name."</option>";
       }

        return response([
                 'html'      =>    $html
        ]);
    }
    public function getSubjectsOfLevel($id){
        $subjects = Subject::where('level_id',$id)->get();
        $html = '';
        foreach($subjects as $subject){
          $html .= "<option value=".$subject->id.">".$subject->name."</option>";
       }

        return response([
                 'html'      =>    $html
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',compact('teacher'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher)
    {

        $teacher->update(request()->all());
        return redirect('teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('teacher');
    }

    public function teacherSign(Request $request){
        $validatedData = $request->validate([
            'teacher_id' => 'required|numeric',
            'date' => 'required|date',
            'lesson' => 'required|in:Unit,Revision,Test',
            'unit_1' => 'numeric',
            'unit_2' => 'numeric'
        ]);
            $sign = TeacherSignature::create($validatedData);
            return response()->json($sign);
    }
    public function editTeacherSign(){

    }
    public function teacherDatatable(Request $request){
        $teachers = Teacher::with(['section','section.level','subject'])->get();
      //  dd( $teachers);
        return Datatables::of($teachers)
        ->addColumn('name', function($col){
            return $col->position->staff->full_name;})
            ->addColumn('levelName', function($col){
                return $col->section->level->name;})
                ->addColumn('sectionName', function($col){
                    return $col->section->name;})
                    ->addColumn('subjectName', function($col){
                        return $col->subject->name;})
                   ->make(true);
    }
}

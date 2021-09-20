<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Check;
use App\Models\Section;
 use App\Models\Subject;
 use App\Models\Student;
 use App\Models\User;
 use App\Models\Permission;
 use App\Models\PermissionRole;
 use App\Models\Role;
 use App\Models\StudentSection;
 use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    public function level(){

        return view('settings.level');
    }

    public function levelDatatable(){
        $levels = Level::all();
        return Datatables::of($levels)
                    ->addColumn('phase', function($col) {
                        return $col->phase->name;
                    })->make(true);
    }

    public function levelSubjectDatatable(Request $request) {

        $subjects = Subject::where('level_id',$request['id'])->get();

        return Datatables::of($subjects)->make(true);
    }

    public function levelSectionDatatable(Request $request) {

        $sections = Section::where('level_id',$request['id'])->get();

        return Datatables::of($sections)->make(true);
    }


public function section()
{
    return view('section.index');
}
public function sectionDatatable(){
    $sections = Check::all();
    return Datatables::of($sections)
                ->addColumn('region', function($col) {
                    return $col->project->region->name;
                })->make(true);
}

public function showUsers()
{
    return view('user.index');
}

public function create(){
    $user = Auth::user();
    if($user->hasPermission('User Managemment')){
    $roles=Role::all();
    return view('user.create',compact('roles'));}
    else return response()->json('Invalid Permission');
}

public function userDatatable(){
    $users = User::all();
    return Datatables::of($users)->addColumn('role_name',function($col){
        return $col->role->name;
    })->make(true);
}
public function reportOfStudent(){
    $student = Student::with(['sections' => function ($query){
        $query->orderby('id','desc');}])->with(['sections.section','sections.section.level','sections.absences','sections.payments'])->get();
         $test = $student[0]->sections->first()->payments->sum('amount');
        // dd( $test);
        return view('settings.reportOfStudent');
}
public function reportOfStudentsDatatable(){
    $student = Student::with(['sections' => function ($query){
        $query->orderby('id','desc');}])->with(['sections.section','sections.section.level','sections.absences','sections.payments'])->get();

    return Datatables::of($student)->addColumn('first_name', function($col){
        return $col->first_name;
    })->addColumn('last_name', function($col){
        return $col->last_name;
    })->
    addColumn('section', function($col){
        if(  $col->sections->first()->section!=null)
        return $col->sections->first()->section->name;
        else return"-";
    })->addColumn('level', function($col){
        if(  $col->sections->first()->section!=null)
        return $col->sections->first()->section->level->name;
        else return"-";
    })->addColumn('excused', function($col){
        if( sizeof($col->sections->first()->absences) !=0 && $col->sections->first()->absences!=null)
        return strval ($col->sections->first()->absences->sum('excused'));
        else return "0";
    })->addColumn('unexcused', function($col){
        if( sizeof($col->sections->first()->absences) !=0 && $col->sections->first()->absences!=null)
        return strval ($col->sections->first()->absences->sum('unexcused'));
        else return "0";
    })->addColumn('totalofpayments', function($col){
        if( sizeof($col->sections->first()->payments) !=0 &&  $col->sections->first()->payments!=null)
        return strval ( $col->sections->first()->payments->sum('amount') ) ;
        else return "0";
    })->make(true);
}
public function SubjectDatatable(){
    $subjects = Subject::with('level')->get();
       return Datatables::of($subjects)->addColumn('level', function($col) {
        return $col->level->name;
    })->make(true);
}

public function store(Request $request){

    User::create([
        'staff_id' => '1',
        'role_id' => $request['role_id'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'is_founder' => 0,
        ]);
    return redirect('user');
}

public function edit(User $user){
    $user = Auth::user();
    if($user->hasPermission('User Managemment')){
    $roles=Role::all();
    return view('user.edit',compact(['user','roles']));}
    else return response()->json('Invalid Permission');
}

public function update(User $user)
{

    $user->update(request()->all());
    return redirect('user');
}


 }


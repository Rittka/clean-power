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


    public function show(Staff $staff){

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

    public function viewPosition( Staff $staff ) {
        $user = Auth::user();
        if($user->hasPermission('Employee Managemment')){
        $positions = Position::all();

        $positionsManger = $positions->where('type_id',1);
        $positionsEducational = $positions->where('type_id',2);
        $positionsSupporter = $positions->where('type_id',3);
        $generalService = $positions->where('type_id',4);
        $types = PositionType::all();
        return view( 'staff.addPosition', compact( ['positions', 'types' ,'positionsManger' , 'positionsEducational' , 'positionsSupporter' , 'generalService' ] ) );
    }
    else return response()->json('Invalid Permission');
}

    public function addPosition( Request $request, $id ) {

        $staff_id = $id;
        $year = $request->input( 'year' );
        $temp = $request->input( 'position_ids' );
        foreach ( $temp as $pos ) {
            PositionStaff::create( [
                'staff_id' => $staff_id,
                'position_id' => $pos,
                'year' => $year,
            ] );
        }

        return redirect('staff');

    }

    public function createVisitGroup( Request $request ) {

        $year = $request->input( 'year' );
        $name = $request->input( 'name' );
        $request->validate( ['name' => 'required|unique:visit_groups,name,NULL,NULL,year,'.$year] );

        $group = VisitGroup::create( ['name' => $name,
        'year' => $year] );
        //return response()->json( 'hi' );
        $staffs_id = json_decode( $request->input( 'staff_id' ), true )['ids'];
        $result = array();
        foreach ( $staffs_id as $staff_id ) {
            $staff = Staff::find( $staff_id );
            if ( $staff->hasPosition( 'زيارات المسجلين الجدد' ) ) {
                $new =  GroupStaff::create( [
                    'group_id' => $group->id,
                    'Position_staff_id' => $staff_id
                ] );

                $res =  ['success', $new];
            } else {

                $res = ['current user has not position',   $staff->positions];

            }
            array_push( $result, $res );
        }
        return response()->json( $result );
    }

    public function editVisitGroup(Request $request){
        $validatedData = $request->validate([ 'name' => 'required|unique:visit_groups,name,'. (int)$request->input('group_id').',id,year,'.(int)$request->input('year') ,
        'year' => 'required',
        'group_id' =>'required',
        'staff_id' => 'filled|json']);
        $group = VisitGroup::find((int)$request->input('group_id'));
        $group->update([ 'name' => $validatedData['name'],
        'year' => $validatedData['year'] ]);

        if($request->has('staff_id'))
        {   $old_staffs = GroupStaff::where('group_id', $group->id)->delete();

            // $old_staffs->delete();
            $staffs_id = json_decode( $request->input( 'staff_id' ), true )['ids'];

            $result = array();
            foreach ( $staffs_id as $staff_id ) {
                $staff = Staff::find( $staff_id );

                if ( $staff->hasPosition( 'زيارات المسجلين الجدد' ) ) {
                    $new =  GroupStaff::create( [
                        'group_id' => $group->id,
                        'position_staff_id' => $staff_id
                    ] );

                    $res =  ['success', $new];
                } else {

                    $res = ['current user has not position',   $staff->positions];

                }
                array_push( $result, $res );
            }
            return response()->json( $result);

        }
        return response()->json($group);
    }

    public function addStaffSignatureView($id){
        $staff = Staff::find($id);
        $staff_position = PositionStaff::where('staff_id',$id)->with('position')->get();
        return view('staff.addStaffSignature',compact(['id' , 'staff','staff_position']));
    }
    public function addStaffSignature(Request $request){
        TimeSchedule::create($request->all());
        return redirect('staff');

    }
}

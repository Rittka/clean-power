<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use Yajra\Datatables\Datatables;

class EquipmentController extends Controller
{
   public function create(){
    return view('equipment.create');
   }

   public function store(Request $request){
       $request->validate([
           'name' => 'required|string',
           'capacity' => 'required' ,
           'type' => 'required|string',
           'quantity' => 'required|integer',
           'price' => 'required|integer'

       ]);
       Equipment::create($request->all());
       return redirect('/equipment');
   }

   public function update(Request $request , $id){
        $equipment = Equipment::find($id);
        $equipment->update($request->all());
        return redirect('/equipment');

   }

   public function index(){

    return view('equipment.index');
   }

   public function equipmentDatatable(){
    $equipments = Equipment::all();
    return Datatables::of($equipments)->make(true);
}

   public function show(){
    return view('equipment.show');
   }
   public function edit($id){

    $equipment = Equipment::find($id);
    return view('equipment.edit',compact('equipment'));
   }
   public function person(){
      return view('student.create');
     }

     public function destroy($id){

       Equipment::find($id)->delete();

        return redirect('/equipment');;
       }
}

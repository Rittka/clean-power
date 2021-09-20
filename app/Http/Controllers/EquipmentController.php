<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
   public function create(){
    return view('equipment.create');
   }
   public function index(){
    return view('equipment.index');
   }
   public function show(){
    return view('equipment.show');
   }
   public function edit(){
    return view('equipment.edit');
   }
   public function person(){
      return view('student.create');
     }
}

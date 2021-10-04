<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('maintenance.create');
    }
    public function createNotWork_equip(){
        return view('maintenance.createNotWorking_equipment');
    }
}

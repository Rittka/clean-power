<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
public function create(){
    return view('project.create');
}
public function index(){
    return view('project.index');
}
public function edit(){
    return view('project.edit');
}
public function show(){
    return view('project.show');
}

}

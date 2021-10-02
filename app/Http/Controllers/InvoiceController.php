<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class InvoiceController extends Controller
{
    public function create(){
        return view('invoice.create');
    }
    public function index(){
        return view('invoice.index');
    }
    public function edit(){
        return view('invoice.edit');
    }
    public function show(){
        return view('invoice.show');
    }
}

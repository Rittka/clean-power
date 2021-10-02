<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Region;

class RegionController extends Controller
{
    public function index()
    {

        return view('region.index');
    }

    public function regionDatatable(Request $request){
        $regions = Region::all();

        return Datatables::of($regions)->make(true);
    }
    public function create()
    {

        return view('region.create');
    }

    public function store(Request $request ){
     $validateData =   $request->validate([
            'name' => 'required|string',
            'street' => 'required|string'
        ]);

        Region::create($validateData);
        return redirect('region');
    }

    public function  edit($id){
        $region = Region::find($id);

        return view('region.edit' , compact('region'));

    }

    public function update(Request $request, $id){
        $region = Region::find($id);

        $region->update($request->all());

        return redirect('region');
    }

    public function destroy($id){

        Region::find($id)->delete();

        return redirect('region');;
    }
}

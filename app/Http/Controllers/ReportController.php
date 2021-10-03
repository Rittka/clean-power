<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ReportController extends Controller
{
    public function reportOfCustomer(){


        return view('report.reportOfCustomer');
    }
    public function reportofearnings(){


        return view('report.reportofearnings');
    }
    public function reportOfequipment(){


        return view('report.reportOfequipment');
    }
    public function reportOfinvoice_details(){


        return view('report.reportOfinvoice_details');
    }
    public function reportOfmonthofchecks(){


        return view('report.reportOfmonthofchecks');
    }
    public function reportofmonthofmaintenance(){


        return view('report.reportofmonthofmaintenance');
    }
    public function reportOfproject_numofcustomer(){


        return view('report.reportOfproject_numofcustomer');
    }
    public function reportofproject_numofregions(){


        return view('report.reportofproject_numofregions');
    }
    public function reportOfStaff(){


        return view('report.reportOfStaff');
    }
    public function reportOfSupplier(){


        return view('report.reportOfSupplier');
    }

    public function MMDatatable(){

        $this_month = date("m");
        $this_year = date("Y");

        $from = date("1-".$this_month ."-".$this_year);
        $to = date("30-".$this_month ."-".$this_year);


        $data = Maintenance::whereBetween('date_of_maintenance',[$from , $to]);
        return Datatables::of($data)
        ->addColumn('custom_name', function($col){
            return $col->person->fullname;
        })->
        addColumn('region_name', function($col){
            return $col->region->name .", ".$col->region->street ;
        })->make(true);
    }
}

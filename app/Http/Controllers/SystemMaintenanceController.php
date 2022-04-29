<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Miscellaneousfee;
use App\Model\SchoolYear;

class SystemMaintenanceController extends Controller
{
    public function index(){
        $school_year = SchoolYear::first();

        $miscellaneousfee = Miscellaneousfee::where('school_year',$school_year->school_year)->get();
        return view('systemMaintenance.index', compact('miscellaneousfee','school_year'));

    }

    



}

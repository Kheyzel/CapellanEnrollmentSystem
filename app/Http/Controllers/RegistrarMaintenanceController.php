<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SchoolYear;

class RegistrarMaintenanceController extends Controller
{
    public function index(){
        $school_year = SchoolYear::first();

        return view('systemMaintenance.registrarMaintenance.index', compact('school_year'));

    }
}

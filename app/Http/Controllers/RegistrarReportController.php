<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarReportController extends Controller
{
    public function index(){
        return view('reports.registrarReport.index');
    }


}

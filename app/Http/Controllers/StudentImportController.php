<?php

namespace App\Http\Controllers;


use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class StudentImportController extends Controller
{
 

     public function import(Request $request)
    {

        $file = $request->file('student_excel');


        $import = new StudentImport;
        $import -> import($file);

        
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Excel file imported successfully');
    } 
}

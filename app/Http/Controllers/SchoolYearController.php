<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SchoolYear;
// use App\Model\Student;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class SchoolYearController extends Controller
{

    public function update(Request $request, $id){

        // $student = new Student;
        $schoolyear = SchoolYear::findOrfail($id);
        $schoolyear->update(
            $request->all()
        );

        //logs
        activity('Registrar Logs')
        ->causedBy(Auth::user())
        // ->performedOn($student)
        ->createdAt(now())
        ->log('Updated the active school year');
        
        return redirect()->route('registrarMaintenance.index');

    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class DropoutController extends Controller
{
    public function index(){
        $dropout_students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Dropped')->get();
        return view('dropouts.index',compact('dropout_students'));
    }

    public function store(Request $request){

        $drop_date = Carbon::today()->format('m-d-Y');
        $student = Student::findOrfail($request->id);

        //Update Student Status and Add Dropout Date
        $student->update(['enroll_status'=>'Dropped', 'drop_date'=>$drop_date, 'drop_reason'=>$request->reason]);
        $student->save();






        //logs
        activity('Registrar Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Moved a student to dropout list');

        return redirect()->route('dropout.index');
    }

    public function show($id)
    {   
        
        $student = Student::with('course','yearlevel')->findorfail($id);
        return view('dropouts.show', compact('student'));
    }
}

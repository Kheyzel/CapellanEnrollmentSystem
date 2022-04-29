<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\G11Completer;
use App\Model\Student;


class G11CompleterController extends Controller
{
    public function store($std_id){

           $g11completer = new G11Completer;
           $g11completer->student_id = $std_id;  
           $g11completer->save();

            //update status of student
           $student = Student::findOrfail($std_id);
           $student->update(['yearlevel_id'=> '2', 'enroll_status' =>'Unenrolled for Grade 12']);

           return redirect()->route('student_record.index',$std_id)->with('swal', 'success.');
    }
}

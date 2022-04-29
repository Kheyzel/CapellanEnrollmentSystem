<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Graduate;

class GraduateController extends Controller
{

    public function index(){

        $grd_students = Student::with('course', 'graduates')->where('enroll_status' ,'=', 'Graduated')->get();
        return view('graduates.index',compact('grd_students'));
    }
    public function store($std_id){
        
            $graduating_std = new Graduate;
           $graduating_std->student_id = $std_id;  
           $graduating_std->year_graduated = 2022;  
           $graduating_std->save();

            //update status of student
           $student = Student::findOrfail($std_id);
           $student->update(['yearlevel_id'=> '2', 'enroll_status' =>'Graduated']);

           return redirect()->route('graduate.index',$std_id);
    }

    public function show($id)
    {   
        
        $student = Student::with('course','yearlevel')->findorfail($id);
        // dd($student->last_name);
        return view('graduates.show', compact('student'));
        
    }
}

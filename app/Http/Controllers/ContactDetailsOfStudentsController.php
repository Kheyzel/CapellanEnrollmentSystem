<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Yearlevel;
use App\Model\Course;

class ContactDetailsOfStudentsController extends Controller
{
    public function index(){

        $yearlevels = Yearlevel::all();
        $courses = Course::all();

        $yearcourse = "All Students";
        
        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
    }


    public function show(Request $request){

        //this will return all student
        if($request->year_id == 0) {
            if($request->course_id == 0) {
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
        
                $yearcourse = "All Students";
        
         
                $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Enrolled')->get();
                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }

             //this will return all student from g11andg12 of selected course in condition of search
            elseif($request->course_id != 0) {

                $yearlevels = Yearlevel::all();
                $courses = Course::all(); 

                        $course = Course::findorfail($request->course_id);
                $yearcourse = 'All Students from ' . $course->course;
         
                $students = Student::with('course', 'yearlevel')->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }
            
            //this will return any of the condition in search
            else{
            
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
            
                        $year =  Yearlevel::findorfail($request->year_id);
                        $course = Course::findorfail($request->course_id);
            
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;

                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }
        }

        //this will return all grade-11 student
        elseif(($request->year_id == 1)){

            if($request->course_id == 0) {
                
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                $yearcourse = 'Grade 11 Students' ;

                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }   

            //this will return any of the condition in search
            else{
            
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
            
                $year =  Yearlevel::findorfail($request->year_id);
                $course = Course::findorfail($request->course_id);
            
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;

                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }  


    }

    //this will return all grade-12 student
    elseif(($request->year_id == 2)){

            if($request->course_id == 0) {

                $yearlevels = Yearlevel::all();
                $courses = Course::all();    
                
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('enroll_status' ,'=', 'Enrolled')->get(); 
                $yearcourse = 'Grade 12 Students' ;

                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }    

            //this will return any of the condition in search
            else{
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
                
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                
                        $year =  Yearlevel::findorfail($request->year_id);
                        $course = Course::findorfail($request->course_id);
                
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;
                
                return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
            }

    }
    
    //this will return any of the condition in search 
     else{

        $yearlevels = Yearlevel::all();
        $courses = Course::all();

        $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
   
                $year =  Yearlevel::findorfail($request->year_id);
                $course = Course::findorfail($request->course_id);

        $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;
        
        return view('reports.registrarReport.contactDetailsofStudentReport.contactDetailsofStudent.index',compact('students','yearlevels','courses','yearcourse'));
    }

 }

}

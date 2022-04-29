<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Yearlevel;
use App\Model\Course;
use App\Model\Tuitionpayment;
use App\Model\Miscellaneousfee;
use App\Model\TuitionFee;

class AccountingReportController extends Controller
{
    public function index(){
        
        // //*************G11 Transaction*************//
    
        // //Tuition
        // $tuition_fee = 19400;
        // $std_payment = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->get();
        // $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
        // $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');
        
        // //Miscellaneous
        // $total_miscellaneous_fee  = Miscellaneousfee::sum('amount');
        // //Computation
        // $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
        // $balance = $total_tuition_fee - $std_total_paid;


    
    
        $yearlevels = Yearlevel::all();
        $courses = Course::all();

        $yearcourse = "All Students";

        $students = Student::with('course', 'yearlevel','Tuitionpayment')->where('enroll_status' ,'=', 'Enrolled')->get();
       
       
        $miscellaneous_fee  = Miscellaneousfee::all();
        $tuition_fee  = TuitionFee::all();


        //  //Tuition
        //  $tuition_fee = 19400;
        //  $std_payment = Tuitionpayment::with('student')->where('yearlevel_payment',1)->get();
        //  $discount = Tuitionpayment::with('student')->where('yearlevel_payment',1)->sum('discount');
        //  $std_total_paid = Tuitionpayment::with('student')->where('yearlevel_payment',1)->sum('payment_amount');
        //  dd($std_total_paid);

        //  //Miscellaneous
          
        //  //Computation
        //  $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
        //  $balance = $total_tuition_fee - $std_total_paid;

        // $std_payment = Tuitionpayment::with('student')->where('yearlevel_payment',1)->get();

        
        
        return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse','miscellaneous_fee','tuition_fee','tuition_fee'));
    }



    public function show(Request $request){

        //this will return all student
        if($request->year_id == 0) {
            if($request->course_id == 0) {
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
        
                $yearcourse = "All Students";
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();
         
                $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Enrolled')->get();
                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
            }

             //this will return all student from g11andg12 of selected course in condition of search
            elseif($request->course_id != 0) {

                $yearlevels = Yearlevel::all();
                $courses = Course::all(); 

                        $course = Course::findorfail($request->course_id);
                $yearcourse = 'All Students from ' . $course->course;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();
         
                $students = Student::with('course', 'yearlevel')->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse','miscellaneous_fee','tuition_fee'));
            }
            
            //this will return any of the condition in search
            else{
            
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
            
                        $year =  Yearlevel::findorfail($request->year_id);
                        $course = Course::findorfail($request->course_id);
            
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();


                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
            }
        }

        //this will return all grade-11 student
        elseif(($request->year_id == 1)){

            if($request->course_id == 0) {
                
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                $yearcourse = 'Grade 11 Students' ;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();

                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
            }   

            //this will return any of the condition in search
            else{
            
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
            
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
            
                $year =  Yearlevel::findorfail($request->year_id);
                $course = Course::findorfail($request->course_id);
            
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();

                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
            }  


    }

    //this will return all grade-12 student
    elseif(($request->year_id == 2)){

            if($request->course_id == 0) {

                $yearlevels = Yearlevel::all();
                $courses = Course::all();    
                
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('enroll_status' ,'=', 'Enrolled')->get(); 
                $yearcourse = 'Grade 12 Students' ;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();

                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
            }    

            //this will return any of the condition in search
            else{
                $yearlevels = Yearlevel::all();
                $courses = Course::all();
                
                $students = Student::with('course', 'yearlevel')->where('yearlevel_id',  $request->year_id)->where('course_id',  $request->course_id)->where('enroll_status' ,'=', 'Enrolled')->get();
                
                        $year =  Yearlevel::findorfail($request->year_id);
                        $course = Course::findorfail($request->course_id);
                
                $yearcourse = 'Grade ' . $year->yearlevel . ' - ' . $course->course;
                $miscellaneous_fee  = Miscellaneousfee::all();
                $tuition_fee  = TuitionFee::all();
                
                return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
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
        $miscellaneous_fee  = Miscellaneousfee::all();
        $tuition_fee  = TuitionFee::all();
        
        return view('reports.accountingReport.accountingDetailsReport.index',compact('students','yearlevels','courses','yearcourse', 'miscellaneous_fee','tuition_fee'));
    }

 }
}

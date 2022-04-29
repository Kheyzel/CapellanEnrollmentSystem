<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;


class YearlyStudentReportController extends Controller
{
    public function index(){

        $allSchoolYear = Student::distinct()->get('school_year');

        $allSchoolYear_g12 = Student::distinct()->get('school_year_g12');

        return view('reports.registrarReport.yearlyStudentsReport.index',compact('allSchoolYear','allSchoolYear_g12'));
    }

    public function search(Request $request){

        $allSchoolYear = Student::distinct()->get('school_year');
        $allSchoolYear_g12 = Student::distinct()->get('school_year_g12');

        $students = Student::with('course', 'yearlevel')->where('school_year',$request->school_year)->get();
        $school_year = $request->school_year;

        return view('search',compact('students','allSchoolYear','school_year','allSchoolYear_g12'));

    }

    public function search_g12(Request $request){

        $allSchoolYear = Student::distinct()->get('school_year');
        $allSchoolYear_g12 = Student::distinct()->get('school_year_g12');


        $students = Student::with('course', 'yearlevel')->where('school_year_g12',$request->school_year)->get();
        $school_year = $request->school_year;
        return view('search_g12',compact('students','allSchoolYear','school_year','allSchoolYear_g12'));

    }

    // public function search(Request $request){

    //     $allSchoolYear = Student::distinct()->get('school_year');

    //     if($request->school_year == 0){
    //         if($request->grade == 0){
    //             $students = Student::with('course', 'yearlevel')->get();
    //         }
    //         else{

    //             $students = Student::with('course', 'yearlevel')->where('yearlevel_id', $request->grade)->get();
    //         }
            

    //     }

    //     else{
    //         if($request->grade == 0){
    //             $students = Student::with('course', 'yearlevel')->where('school_year',$request->school_year)->get();
    //         }
    //         else{
                
    //             $students = Student::with('course', 'yearlevel')->where('school_year',$request->school_year)->where('yearlevel_id', $request->grade)->get();
    //         }
    //     }
    //     return view('search',compact('students','allSchoolYear'));

    // }
}

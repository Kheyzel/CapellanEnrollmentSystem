<?php

namespace App\Http\Controllers;

use App\Model\Dashboard;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Course;
use App\Model\SchoolYear;
use App\Model\G11Completer;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $school_year = SchoolYear::first();
        $unenrolled_gr11 = Student::where('enroll_status', 'Pending')->count();
        $unenrolled_gr12 = Student::where('enroll_status', 'Unenrolled for Grade 12')->count();
        $Unofficially_enrolled = $unenrolled_gr11 + $unenrolled_gr12;

       // $student_cnt = Student::all()->count();

       $student_cnt = Student::where('enroll_status', 'Enrolled')->count();


        $course = Course::with('student')->orderby('id', 'ASC')->get();


        //Industrial Arts(IA)-Automotive Servicing 11

         $IAAS11F = Student::whereHas('course', function($q) {
             $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
         })->whereHas('yearlevel', function($qq) {
             $qq->where('yearlevel', '11');
         })->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

         $IAAS11M = Student::whereHas('course', function($q) {
            $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
        })->whereHas('yearlevel', function($qq) {
            $qq->where('yearlevel', '11');
        })->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

        $IAAS11T = Student::whereHas('course', function($q) {
            $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
        })->whereHas('yearlevel', function($qq) {
         $qq->where('yearlevel', '11')->where('enroll_status', 'Enrolled');
        })->count();
        
        //Industrial Arts(IA)-Automotive Servicing 12

        $IAAS12F = Student::whereHas('course', function($q) {
            $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
        })->whereHas('yearlevel', function($qq) {
            $qq->where('yearlevel', '12');
        })->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

        $IAAS12M = Student::whereHas('course', function($q) {
           $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
       })->whereHas('yearlevel', function($qq) {
           $qq->where('yearlevel', '12');
       })->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

       $IAAS12T = Student::whereHas('course', function($q) {
           $q->where('course', 'Industrial Arts(IA)-Automotive Servicing');
       })->whereHas('yearlevel', function($qq) {
        $qq->where('yearlevel', '12');
       })->where('enroll_status', 'Enrolled')->count();


       //Industrial Arts(IA)-Electrical Installation and Maintenance 11
        
       $IAEIM11F = Student::whereHas('course', function($q) {
        $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
    })->whereHas('yearlevel', function($qq) {
        $qq->where('yearlevel', '11');
    })->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

    $IAEIM11M = Student::whereHas('course', function($q) {
       $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
   })->whereHas('yearlevel', function($qq) {
       $qq->where('yearlevel', '11');
   })->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

   $IAEIM11T = Student::whereHas('course', function($q) {
       $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
   })->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
   })->where('enroll_status', 'Enrolled')->count();
   
   //Industrial Arts(IA)-Electrical Installation and Maintenance 12

   $IAEIM12F = Student::whereHas('course', function($q) {
       $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
   })->whereHas('yearlevel', function($qq) {
       $qq->where('yearlevel', '12');
   })->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

   $IAEIM12M = Student::whereHas('course', function($q) {
      $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
  })->whereHas('yearlevel', function($qq) {
      $qq->where('yearlevel', '12');
  })->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

  $IAEIM12T = Student::whereHas('course', function($q) {
      $q->where('course', 'Industrial Arts(IA)-Electrical Installation and Maintenance');
  })->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
  })->where('enroll_status', 'Enrolled')->count();


  //Industrial Arts(IA)-Electrical Installation and Maintenance 11
        
  $IAEPAS11F = Student::whereHas('course', function($q) {
    $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$IAEPAS11M = Student::whereHas('course', function($q) {
   $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '11');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$IAEPAS11T = Student::whereHas('course', function($q) {
   $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '11');
})->where('enroll_status', 'Enrolled')->count();


//Industrial Arts(IA)-Electrical Installation and Maintenance 12

$IAEPAS12F = Student::whereHas('course', function($q) {
    $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '12');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$IAEPAS12M = Student::whereHas('course', function($q) {
   $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$IAEPAS12T = Student::whereHas('course', function($q) {
   $q->where('course', 'Industrial Arts(IA)-Electronic Products Assembly and Servicing');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '12');
})->where('enroll_status', 'Enrolled')->count();


//Information and Communication Technology (ICT)-Computer System Servicing NC II 11
        
$ICTCSS11F = Student::whereHas('course', function($q) {
    $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$ICTCSS11M = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '11');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$ICTCSS11T = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '11');
})->where('enroll_status', 'Enrolled')->count();

//Information and Communication Technology (ICT)-Computer System Servicing NC II 12

$ICTCSS12F = Student::whereHas('course', function($q) {
    $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '12');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$ICTCSS12M = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$ICTCSS12T = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Computer System Servicing NC II');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '12');
})->where('enroll_status', 'Enrolled')->count();

//Information and Communication Technology (ICT)-Programming 11
        
$ICTP11F = Student::whereHas('course', function($q) {
    $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$ICTP11M = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '11');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$ICTP11T = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '11');
})->where('enroll_status', 'Enrolled')->count();


//Information and Communication Technology (ICT)-Programming 12

$ICTP12F = Student::whereHas('course', function($q) {
    $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '12');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$ICTP12M = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$ICTP12T = Student::whereHas('course', function($q) {
   $q->where('course', 'Information and Communication Technology (ICT)-Programming');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '12');
})->where('enroll_status', 'Enrolled')->count();

//Home Economics (HE)-Housekeeping NC II/Front Office Services NC II 11
        
$HEHFOS11F = Student::whereHas('course', function($q) {
    $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$HEHFOS11M = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '11');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$HEHFOS11T = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '11');
})->where('enroll_status', 'Enrolled')->count();

//Home Economics (HE)-Housekeeping NC II/Front Office Services NC II 12

$HEHFOS12F = Student::whereHas('course', function($q) {
    $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '12');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$HEHFOS12M = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$HEHFOS12T = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '12');
})->where('enroll_status', 'Enrolled')->count();

//Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II 11
        
$HEHFBS11F = Student::whereHas('course', function($q) {
    $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '11');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$HEHFBS11M = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '11');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$HEHFBS11T = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '11');
})->where('enroll_status', 'Enrolled')->count();

//Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II 11

$HEHFBS12F = Student::whereHas('course', function($q) {
    $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II 11');
})->whereHas('yearlevel', function($qq) {
    $qq->where('yearlevel', '12');
})->where('sex','Female')->where('enroll_status', 'Enrolled')->count();

$HEHFBS12M = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II 11');
})->whereHas('yearlevel', function($qq) {
   $qq->where('yearlevel', '12');
})->where('sex','Male')->where('enroll_status', 'Enrolled')->count();

$HEHFBS12T = Student::whereHas('course', function($q) {
   $q->where('course', 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II 11');
})->whereHas('yearlevel', function($qq) {
$qq->where('yearlevel', '12');
})->where('enroll_status', 'Enrolled')->count();


         
         return view('dashboard.index',compact('Unofficially_enrolled','student_cnt','course','school_year',
        'unenrolled_gr12', 'unenrolled_gr12',
         'IAAS11F','IAAS11M','IAAS11T','IAAS12F','IAAS12M','IAAS12T',
        'IAEIM11F','IAEIM11M','IAEIM11T','IAEIM12F','IAEIM12M','IAEIM12T',
        'IAEPAS11F','IAEPAS11M','IAEPAS11T','IAEPAS12F','IAEPAS12M','IAEPAS12T',
        'ICTCSS11F','ICTCSS11M','ICTCSS11T','ICTCSS12F','ICTCSS12M','ICTCSS12T',
        'ICTP11F','ICTP11M','ICTP11T','ICTP12F','ICTP12M','ICTP12T',
        'HEHFOS11F','HEHFOS11M','HEHFOS11T','HEHFOS12F','HEHFOS12M','HEHFOS12T',
        'HEHFBS11F','HEHFBS11M','HEHFBS11T','HEHFBS12F','HEHFBS12M','HEHFBS12T'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}

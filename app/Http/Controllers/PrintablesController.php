<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Tuitionpayment;
use App\Model\Miscellaneousfee;
use App\Model\SchoolYear;
use Illuminate\Support\Facades\DB;
use App\Model\TuitionFee;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class PrintablesController extends Controller
{
    public function enrollmentForm($id){

        $school_year = SchoolYear::first();
        $student = Student::with('course','yearlevel')->findorfail($id);
        // $ActivityLogs = Activity::all(); 
        
        //logs
        activity('Student Record Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Downloaded Enrollment Form');

        $ActivityLogs = Activity::findOrfail($id);
     $year = Carbon::now()->year;


        $school_id = 405347;
        // dd($ActivityLogs->id);
        
        
        return view('printables.enrollmentForm', compact('student','school_year', 'ActivityLogs', 'school_id'));
        
    }


    //***Payment slip g11 ***/ //upom Enrollment slip ito
    public function paymentSlip($id){
        //written but i dont know what is this
        // $std_payment = Student::with('Tuitionpayment')->findorfail($id);

        // schoolyear
        $school_year = SchoolYear::first();

        //Student
        $student = Student::with('course','yearlevel')->findorfail($id);
        //Tuition
        if ($student->transferee == 'Yes'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee = $fee->amount;

            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');  
        
            //Miscellanious
            $total_miscellaneous_fee = 0;

            //Computation
            $total_tuition_fee = $tuition_fee - $discount;
            $balance = $tuition_fee - $std_total_paid - $discount;
        }
        else{
            $tuition_fee = 19400;

            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');  
            
            //Miscellanious
            $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',1)->where('school_year',$student->school_year)->sum('amount');

            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $tuition_fee - $std_total_paid - $discount + $total_miscellaneous_fee;
        }
        
        //logs
        $ActivityLog = (
        activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Generated Enrollment Payment Slip')
    );

        $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;
        
        

        return view('printables.enrollmentPaymentSlip',compact('school_year', 'student','balance','total_miscellaneous_fee','tuition_fee','total_tuition_fee','discount','std_total_paid', 'ActivityLog_id', 'year', 'school_id'));
    }
    //***Payment slip g12 ***/ //upom Enrollment slip ito
    public function paymentSlipG12($id){
        //written but i dont know what is this
        // $std_payment = Student::with('Tuitionpayment')->findorfail($id);

        //Student
        $school_year = SchoolYear::first();
        $student = Student::with('course','yearlevel')->findorfail($id);

        //Tuition
        if ($student->transferee == 'Yes'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee = $fee->amount;

            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('payment_amount');  
            
            //Miscellanious
            $total_miscellaneous_fee  = 0;
    
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $tuition_fee - $std_total_paid - $discount + $total_miscellaneous_fee;
        }
        else{
            $tuition_fee = 19400;
            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('payment_amount');  
            
            //Miscellanious
            $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',2)->where('school_year',$student->school_year_g12)->sum('amount');
    
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $tuition_fee - $std_total_paid - $discount + $total_miscellaneous_fee;
        }
       
        $ActivityLog = (
            activity('Enrollment Logs')
            ->causedBy(Auth::user())
            ->performedOn($student)
            ->createdAt(now())
            ->log('Generated Enrollment Payment Slip')
        );

        $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;

        return view('printables.enrollmentPaymentSlipG12',compact('school_year','student','balance','total_miscellaneous_fee','tuition_fee','total_tuition_fee','discount','std_total_paid', 'std_payment', 'ActivityLog_id', 'year', 'school_id'));
    }

    //***Payment slip g11 ***/ //upon addition of payment slip ito
    public function TuitionPaymentSlip($id){

        //student
        $student = Student::with('course','yearlevel')->findorfail($id);
        $school_year = SchoolYear::first();

        //Tuition
        if ($student->transferee == 'Yes'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee = $fee->amount;
            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');

            //Miscellanious
            $total_miscellaneous_fee  =0;

            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
        }
        else{
            $tuition_fee = 19400;
            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');

            //Miscellanious
            $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',1)->where('school_year',$student->school_year)->sum('amount');

            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
            }

            //logs
        $ActivityLog = (
            activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Generated Payment Slip')
        );
          //  $ActivityLogs = Activity::findOrfail($id);
          $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;

        return view('printables.addTuitionPaymentSlip', compact('student','std_payment','std_total_paid', 
        'discount','balance', 'tuition_fee','total_miscellaneous_fee','total_tuition_fee', 'school_year', 'ActivityLog_id', 'year', 'school_id'));
    }
    //***Payment slip g12 ***/ //upon addition of payment slip ito
    public function TuitionPaymentSlipG12($id){

        //student
        $student = Student::with('course','yearlevel')->findorfail($id);
        $school_year = SchoolYear::first();

        //Tuition
        if ($student->transferee == 'Yes'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee = $fee->amount;
            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('payment_amount');
    
            //Miscellanious
            $total_miscellaneous_fee  = 0;
            
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
        }
        else{
            $tuition_fee = 19400;
            $std_payment = Tuitionpayment::where('student_id',$id)->latest()->first();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('payment_amount');
    
            //Miscellanious
            $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',2)->where('school_year',$student->school_year_g12)->sum('amount');
            
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
        }
       
        $ActivityLog = (
            activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Generated Payment Slip')
        );

        $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;

        return view('printables.addTuitionPaymentSlipG12', compact('student','std_payment','std_total_paid', 
        'discount','balance', 'tuition_fee','total_miscellaneous_fee','total_tuition_fee', 'school_year', 'ActivityLog_id', 'year', 'school_id'));
    }


    public function StatementOfAccount($id){

        $student = Student::with('course','yearlevel')->findorfail($id);
        $school_year = SchoolYear::first();

        $no_g11_record = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->first();
        //*************G11 Transaction*************//
    
        //Tuition
        if ($student->transferee == 'Yes'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee = $fee->amount;

            $std_payment = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->get();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');
            
            //Miscellaneous
            $total_miscellaneous_fee  = 0;
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
        }
        else{
            $tuition_fee = 19400;
            $std_payment = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->get();
            $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('discount');
            $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->sum('payment_amount');
            
            //Miscellaneous
            $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',1)->where('school_year',$student->school_year)->sum('amount');
            //Computation
            $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
            $balance = $total_tuition_fee - $std_total_paid;
        }

        $ActivityLog = (
            activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Generated Statement of Account')
        );

        $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;

        return view('printables.statementOfAccount', compact('student', 'school_year', 'no_g11_record', 'fee', 'tuition_fee', 'std_payment', 'discount', 'std_total_paid', 'total_miscellaneous_fee', 'total_tuition_fee', 'balance', 'ActivityLog_id', 'year', 'school_id'));

    }

    
    public function StatementOfAccountG12($id){

        $student = Student::with('course','yearlevel')->findorfail($id);
        $school_year = SchoolYear::first();

        $no_g11_record = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',1)->first();
        //*************G12 Transaction*************//
        
        //Tuition
        if ($student->school_type == 'Transferee'){
            $fee = TuitionFee::where('student_id', $id)->first('amount');
            $tuition_fee_g12 = $fee->amount;
        }
        else{
            $tuition_fee_g12 = 19400;
        }

        $std_payment_g12 = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->get();
        $discount_g12 = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('discount');
        $std_total_paid_g12 = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',2)->sum('payment_amount');

        //Miscellaneous
        $total_miscellaneous_fee_g12  = Miscellaneousfee::where('year_level',2)->where('school_year',$student->school_year_g12)->sum('amount');

        //Computation
        $total_tuition_fee_g12 = $tuition_fee_g12 - $discount_g12 + $total_miscellaneous_fee_g12;
        $balance_g12 = $total_tuition_fee_g12 - $std_total_paid_g12;

        $ActivityLog = (
            activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Generated Statement of Account')
        );

        $ActivityLog_id = $ActivityLog->id;
         
            $year = Carbon::now()->year;
            $school_id = 405347;

        return view('printables.statementOfAccountG12', compact('student', 'school_year', 'no_g11_record', 'fee', 'tuition_fee_g12', 'std_payment_g12', 'discount_g12', 'std_total_paid_g12', 'total_miscellaneous_fee_g12', 'total_tuition_fee_g12', 'balance_g12', 'ActivityLog_id', 'year', 'school_id'));

    }

}

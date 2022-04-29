<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tuitionpayment;
use App\Model\Student;
use App\Model\Miscellaneousfee;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;


class AddTuitionPaymentController extends Controller
{
    public function store(Request $request, $id)
    {   
        $student = Student::findorfail($id);
        //Tuition
        $tuition_fee = 19400;
        $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel_id)->sum('payment_amount');
        $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel_id)->sum('discount');
        
        //Miscellaneous

        $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',$student->yearlevel_id)->where('school_year',$student->school_year)->sum('amount');
        

        
        //payment
        $payment = new Tuitionpayment;
        $payment->mode_of_payment = $request->mode_of_payment;
        $payment->payment_amount = $request->payment_amount;
        $payment->yearlevel_payment = $student->yearlevel_id;
        $payment->discount = $request->discount;
        $payment->student_id = $request->student_id;
        $payment->payment_method = $request->payment_method;
        $payment->ref_num = $request->ref_num;

        //Computation
        $balance =  $total_miscellaneous_fee + $tuition_fee - $std_total_paid - $discount;

        //Condiion to return
        if ($balance >= $request->payment_amount){
            $payment->save();

            
        //logs
        activity('Accounting Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Added a payment from remaining balance');
           
            if($student->yearlevel_id == "1"){
                return redirect()->route('TuitionPaymentSlip.print',$id);
            }
            else{
              return redirect()->route('TuitionPaymentSlipG12.print',$id);
            }
            
        }
        else{
            return redirect()->route('accounting.show', $id)->with('Fileadded', 'The amount you paid exceeded in balance.');
        }       
        
    }

    // public function store_g12(Request $request, $id)
    // {   
    //     $student = Student::findorfail($id);
    //     $tuition_fee = 19400;
    //     $std_total_paid = Tuitionpayment::where('student_id', $id)->sum('payment_amount');
    //     $discount = Tuitionpayment::where('student_id', $id)->sum('discount');
    //     $balance =  $tuition_fee  - $std_total_paid - $discount;

    //     $payment = new Tuitionpayment;
    //     $payment->mode_of_payment = $request->mode_of_payment;
    //     $payment->payment_amount = $request->payment_amount;
    //     $payment->yearlevel_payment = $student->yearlevel_id;
    //     $payment->discount = $request->discount;
    //     $payment->student_id = $request->student_id;
       

    //     if ($balance >= $request->payment_amount){
    //         $payment->save();
            
    //     }
    //     else{
    //         $notice = "Sobrang ang bayad";
    //         return redirect()->route('accounting.show', $id)->with('Fileadded', 'Sobra ang bayad mo.');
    //     }       
        
    // }
}

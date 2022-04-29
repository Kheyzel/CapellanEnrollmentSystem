<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Student;
use App\Model\Tuitionpayment;
use App\Model\Miscellaneousfee;
use App\Model\TuitionFee;


class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('accounting.index',compact('students'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with('course','yearlevel')->findorfail($id);
        
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
        
        

       

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             
        
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

        return view('accounting.show', compact('student','std_payment','std_total_paid', 
        'discount','balance', 'tuition_fee','total_miscellaneous_fee','total_tuition_fee', 'std_payment_g12','std_total_paid_g12', 
        'discount_g12','balance_g12', 'tuition_fee_g12','total_miscellaneous_fee_g12','total_tuition_fee_g12', 'no_g11_record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}

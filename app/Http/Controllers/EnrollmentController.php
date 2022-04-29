<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Tuitionpayment;
use App\Model\Course;
use App\Model\Discount;
use App\Model\Miscellaneousfee;
use App\Model\G11Completer;
use App\Model\TuitionFee;
use App\Model\SchoolYear;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //not been use// its ok to delete
    public function index(){
        
        $g11Completers = G11Completer::with('student')->get();
        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Pending')->get();
        return view('enrollment.index',compact('students','g11Completers'));
    }
    //not been use// its ok to delete

    public function g11index()
    {
        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Pending')->where('yearlevel_id',1)->get();
        return view('enrollment.g11Index',compact('students'));
    }

    public function g12index()
    {
        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Pending')->where('yearlevel_id',2)->get();
        $g11Completers = G11Completer::with('student')->get();
        return view('enrollment.g12Index',compact('g11Completers', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::findOrfail($id);
        $school_year = SchoolYear::first();
        //Tuition
        $tuition_fee = 19400;
        $std_payment = Tuitionpayment::where('student_id', $id)->get();
        $std_total_paid = Tuitionpayment::where('student_id', $student->id)->sum('payment_amount');

        //Miscellanious
        $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',$student->yearlevel_id)->where('school_year',$school_year->school_year)->sum('amount');

        //Discount condition, this will determine the what discount of the student will apply
        $discount_type = Discount::all();
         foreach ($discount_type as $dis_type)
         {
               if ($dis_type->discount_type == $student->school_type){
                   $discount = $dis_type->amount;
               }   
         }      


         //Computation
        $total_tuition_fee = $tuition_fee + $total_miscellaneous_fee - $discount ;
        $balance = $total_tuition_fee - $std_total_paid;
        
        return view('enrollment.create', compact('student','std_payment','std_total_paid', 
        'discount','balance', 'tuition_fee','total_miscellaneous_fee','total_tuition_fee'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $student = Student::findOrfail($id);

        $school_year = SchoolYear::first();
        $school_yearrr= $student->school_year;

        if($student->school_year == null){
            $student->update(['school_year'=> $school_year->school_year]);
        }


        if($student->yearlevel_id == 2){
            $student->update(['school_year_g12'=> $school_year->school_year]);

        }



        //Tuition
        $tuition_fee = 19400;
        $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel_id)->sum('payment_amount');

        //Miscellanious
        $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',$student->yearlevel_id)->where('school_year',$school_year->school_year)->sum('amount');
       
        //Discount condition, this will determine the what discount of the student will apply
        $discount_type = Discount::all();
         foreach ($discount_type as $dis_type)
         {
               if ($dis_type->discount_type == $student->school_type){
                   $discount = $dis_type->amount;
               }   
         }      
     
         //Computation
        $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
        $balance = $total_tuition_fee - $std_total_paid;
        //Payment
        
        $payment = new Tuitionpayment;
        $payment->mode_of_payment = $request->mode_of_payment;
        $payment->discount_type = $request->discount_type;
        $payment->payment_amount = $request->payment_amount; 
        $payment->discount = $request->discount;
        $payment->yearlevel_payment = $student->yearlevel_id;
        $payment->student_id = $request->student_id;
        $payment->payment_method = $request->payment_method;
        $payment->ref_num = $request->ref_num;
        
        //Condiion to return
    
        if ($balance >= $request->payment_amount){
            $payment->save();

            //logs
            activity('Enrollment Logs')
            ->causedBy(Auth::user())
            ->performedOn($student)
            ->createdAt(now())
            ->log('Enrolled a student');


             //Update Student Status
            $student->update(['enroll_status'=> 'Enrolled']);

    


            //Condition of return to where reciept will show
            if($student->yearlevel_id == "1"){
                return redirect()->route('paymentSlip.print',$id);
            }
            else{
                return redirect()->route('paymentSlipG12.print',$id);
            }
            
        }
        else{

            return redirect()->route('enrollment.create', $id)->with('Fileadded', 'The amount you paid exceeded in balance.');
        }   
        
    }


    public function store_transferee(Request $request,$id)
    {

        $student = Student::findOrfail($id);
        $school_year = SchoolYear::first();

        if($student->school_year == null){
            $student->update(['school_year'=> $school_year->school_year]);
        }


        if($student->yearlevel_id == 2){
            $student->update(['school_year_g12'=> $school_year->school_year]);

        }


        $tuition = new TuitionFee;
        $tuition->student_id =  $id;
        $tuition->tuition_fee =  $student->school_type;
        $tuition->amount = $request->tuition;
        $tuition->save();

        //Tuition
        $tuition_fee = $request->tuition;
        $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel_id)->sum('payment_amount');

        //Miscellanious
        // $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',1)->where('school_year',$student->school_year)->sum('amount');
        
        //Discount condition, this will determine the what discount of the student will apply
        // $discount_type = Discount::all();
        //  foreach ($discount_type as $dis_type)
        //  {
        //        if ($dis_type->discount_type == $student->school_type){
        //            $discount = $dis_type->amount;
        //        }   
        //  }      
     
         //Computation
        // $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;
        $total_tuition_fee = $tuition_fee;
        $balance = $total_tuition_fee - $std_total_paid;


        //Payment
        
        $payment = new Tuitionpayment;
        $payment->mode_of_payment = $request->mode_of_payment;
        $payment->discount_type = $request->discount_type;
        $payment->payment_amount = $request->payment_amount;
        $payment->discount = $request->discount;
        $payment->yearlevel_payment = $student->yearlevel_id;
        $payment->student_id = $request->student_id;
        $payment->payment_method = $request->payment_method;
        $payment->ref_num = $request->ref_num;
        
        //Condiion to return
        if ($balance >= $request->payment_amount){
            $payment->save();


            //logs
            activity('Enrollment Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
    ->log('Enrolled a student');

             //Update Student Status
        $student->update(['enroll_status'=> 'Enrolled']);


            //Condition of return to where reciept will show
            if($student->yearlevel_id == "1"){
                return redirect()->route('paymentSlip.print',$id);
            }
            else{
                return redirect()->route('paymentSlipG12.print',$id);
            }
            
        }
        else{

            return redirect()->route('enrollment.create', $id)->with('Fileadded', 'The amount you paid exceeded in balance.');
        }   

        
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $student = Student::find($id);
        $student->delete();
        // $id->delete();
        // return redirect()->route('enrollment.g11index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Student;
use App\Model\Tuitionpayment;
use App\Model\Miscellaneousfee;
use App\Model\G11Completer;
use App\Model\Course;
use Illuminate\Http\Request;
use App\Model\SchoolYear;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class StudentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('allStudents');
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
     * @param  \App\Model\Student  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //student
        $student = Student::with('course','yearlevel','document')->findorfail($id);
        $school_year = SchoolYear::first(); 

        //for condition in button g11Completer 
        $isCompleteG11 = G11Completer::where('student_id', $id)->first();

        //Tuition
        $tuition_fee = 19400;
        $discount = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel->id)->sum('discount'); 
        $std_total_paid = Tuitionpayment::where('student_id', $id)->where('yearlevel_payment',$student->yearlevel->id)->sum('payment_amount');   
        
       
        //Miscellanious
        $total_miscellaneous_fee  = Miscellaneousfee::where('year_level',$student->yearlevel_id)->where('school_year',$school_year->school_year)->sum('amount');
                                    

        //Computation
        $total_tuition_fee = $tuition_fee - $discount + $total_miscellaneous_fee;  
        $balance = $total_tuition_fee - $std_total_paid;





        return view('studentRecord.show', compact('student','balance','isCompleteG11'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::all();
        $student = Student::findOrfail($id);
        return view ('studentRecord.edit', compact('student', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $student = Student::findOrfail($id);
            $student->student_num = $request->student_num;
            $student->course_id = $request->course_id;
            $student->yearlevel_id = $request->yearlevel_id;
             $student->lrn = $request->lrn;
             $student->last_name = $request->last_name;
             $student->first_name = $request->first_name;
             $student->middle_name = $request->middle_name;
             $student->suffix = $request->suffix;
            
             $student->sex = $request->sex;
             $student->b_date = $request->b_date;

             $student->contact_num = $request->contact_num;
             $student->email_ad = $request->email_ad;
            
            
             $student->house_num = $request->house_num;
             $student->brgy = $request->brgy;
             $student->city = $request->city;
             $student->province = $request->province;
 
            
             $student->m_tongue = $request->m_tongue;
             $student->religion = $request->religion;
             $student->psa_num = $request->psa_num;

             $student->m_fullname = $request->m_fullname;
             $student->m_educ = $request->m_educ;
             $student->m_occu = $request->m_occu;

             $student->f_fullname = $request->f_fullname;
             $student->f_educ = $request->f_educ;
             $student->f_occu = $request->f_occu;

             $student->g_fullname = $request->g_fullname;  
             $student->g_educ = $request->g_educ;   
             $student->g_occu = $request->g_occu;

             $student->pg_contact_num = $request->pg_contact_num;

             $student->l_year_completion = $request->l_year_completion;
             $student->prev_school = $request->prev_school;
             $student->school_type = $request->school_type;
             $student->prev_school_ad = $request->prev_school_ad;

            if ($request->file('image')) {

                $path = $request->file('image');
                $image = $path->getClientOriginalName();
                $image_path = $request->file('image')->storeAs('student', $image, 'public');
                
                $student->image = $image;
                $student->path = '/storage/'.$image_path;
            }
        
    
            $student->save();

            //logs
            activity('Student Record Logs')
        ->causedBy(Auth::user())
        ->performedOn($student)
        ->createdAt(now())
        ->log('Modified a student record');



            //   $request->validate([
            //       'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //   ]);

            //   
               
            //  if ($request->file('image')) {
   
            //      $imagePath = $request->file('image');
            //      $imageName = $imagePath->getClientOriginalName();
            //      $path = $request->file('image')->storeAs('student', $imageName, 'public');
            //    }
            //    $student->image = $imageName;
            //    $student->path = '/storage/'.$path;

            //    dd($imageName,$path);

            // $student ->save();


        // $student->update($request->all());
        

        return redirect()->route('student_record.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentRecord  $studentRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRecord $studentRecord)
    {
        //
    }

    public function allStudents(){

        $students = Student::with('course', 'yearlevel')->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.allStudent', compact('students'));
    }

    public function HE_FBS_BPP(){

        $students = Student::where('course_id', 7)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.HE_FBS_BPP', compact('students'));
        
    }

    public function HE_H_FOS(){
        
        $students = Student::where('course_id', 6)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.HE_H_FOS', compact('students'));
    }

     public function IA_AS(){
         $students = Student::where('course_id', 1)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
         return view('studentRecord.studentsTable.g11.IA_AS', compact('students'));
     }

     public function IA_EIM(){
        
        $students = Student::where('course_id', 2)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.IA_EIM', compact('students'));
    }

    public function IA_EPAS(){

        $students = Student::where('course_id', 3)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.IA_EPAS', compact('students'));
    }

    public function ICT_CSS(){
        
        $students = Student::where('course_id', 4)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.ICT_CSS', compact('students'));
    }

    public function ICT_P(){
        
        $students = Student::where('course_id', 5)->where('yearlevel_id', 1)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g11.ICT_P', compact('students'));
    }

    //g12
    public function HE_FBS_BPP_12(){

        $students = Student::where('course_id', 7)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.HE_FBS_BPP', compact('students'));
        
    }

    public function HE_H_FOS_12(){
        
        $students = Student::where('course_id', 6)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.HE_H_FOS', compact('students'));
    }

     public function IA_AS_12(){
         $students = Student::where('course_id', 1)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
         return view('studentRecord.studentsTable.g12.IA_AS', compact('students'));
     }

     public function IA_EIM_12(){
        
        $students = Student::where('course_id', 2)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.IA_EIM', compact('students'));
    }

    public function IA_EPAS_12(){

        $students = Student::where('course_id', 3)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.IA_EPAS', compact('students'));
    }

    public function ICT_CSS_12(){
        
        $students = Student::where('course_id', 4)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.ICT_CSS', compact('students'));
    }

    public function ICT_P_12(){
        
        $students = Student::where('course_id', 5)->where('yearlevel_id', 2)->where('enroll_status' ,'=', 'Enrolled')->get();
        return view('studentRecord.studentsTable.g12.ICT_P', compact('students'));
    }

     
}

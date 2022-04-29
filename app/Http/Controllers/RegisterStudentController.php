<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Course;
use App\Model\SchoolYear;

class RegisterStudentController extends Controller
{
    public function create(){

        $course = Course::all();
        return view('registerStudent.create',compact('course'));
    }

    public function store(Request $request){

            $student = new Student;
            $student->course_id = $request->course;
            $student->yearlevel_id = $request->yearlevel;
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
            $student->transferee = $request->transferee;

            $student->enroll_status = "Pending";
            $school_year = SchoolYear::first();
            $student->school_year = $school_year->school_year;
            

            if ($request->file('image')) {

                $path = $request->file('image');
                $image = $path->getClientOriginalName();
                $image_path = $request->file('image')->storeAs('student', $image, 'public');
                
                $student->image = $image;
                $student->path = '/storage/'.$image_path;
            }
            
            $student ->save();

            return redirect()->back();   
    }

    public function store_eform(Request $request){

        $student = new Student;

        //image Request
        $img =  $request->get('image');
        $folderPath = storage_path("app/public/student/");
        $image_parts = explode(";base64,", $img);
        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        $student->image = $fileName;

        $student->course_id = $request->course;
        $student->yearlevel_id = $request->yearlevel;
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
        $student->transferee = $request->transferee;

        $student->enroll_status = "Pending";
        $school_year = SchoolYear::first();
            $student->school_year = $school_year->school_year;

        // if ($request->file('image')) {

        //     $path = $request->file('image');
        //     $image = $path->getClientOriginalName();
        //     $image_path = $request->file('image')->storeAs('student', $image, 'public');
            
        //     $student->image = $image;
        //     $student->path = '/storage/'.$image_path;
        // }

        $student ->save();


        return redirect()->route('eform')->with('ok', 'success.');   
}

    public function import(){
        return view('registerStudent.import');
    }
}

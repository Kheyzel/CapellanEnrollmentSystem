<?php

namespace App\Imports;

use App\Model\Student;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Failure;
use Throwable;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class StudentImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{

    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $course = 0;
        $year = 0;
        if($row['Desired Strand or Course'] == 'Industrial Arts(IA)-Automotive Servicing'){
            $course = 1;
        }
        elseif($row['Desired Strand or Course'] == 'Industrial Arts(IA)-Electrical Installation and Maintenance'){
            $course = 2;
        }
        elseif($row['Desired Strand or Course'] == 'Industrial Arts(IA)-Electronic Products Assembly and Servicing'){
            $course = 3;
        }
        elseif($row['Desired Strand or Course'] == 'Information and Communication Technology (ICT)-Computer System Servicing NC II'){
            $course = 4;
        }
        elseif($row['Desired Strand or Course'] == 'Information and Communication Technology (ICT)-Programming'){
            $course = 5;
        }
        elseif($row['Desired Strand or Course'] == 'Home Economics (HE)-Housekeeping NC II/Front Office Services NC II'){
            $course = 6;
        }
        elseif($row['Desired Strand or Course'] == 'Home Economics (HE)-Food and Beverage Services NC II/Bread and Pastry Production NC II'){
            $course = 7;
        } 

        if($row['Incoming Grade Level'] == '11'){
            $year = 1;
        }
        elseif($row['Incoming Grade Level'] == '12'){
            $year = 2;
        }


        return new Student([

            'course_id'     => $course,
            'yearlevel_id'     => $year,
            'lrn'     => $row['LRN'],
            'last_name'     => $row['Last Name'],
            'first_name'     => $row['First Name'],
            'middle_name'     => $row['Middle Name'],
            'suffix'     => $row['Extension Name'],
            'sex'     => $row['Sex'],
            'b_date'     =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Birthdate']),
            'contact_num'     => $row['Contact Number'],
            'email_ad'     => $row['Email Address'],
            'house_num'     => $row['House Number'],
            'brgy'     => $row['Barangay'],
            'city'     => $row['City'],
            'province'     => $row['Province'],
            'm_tongue'     => $row['Mother Tongue'],
            'religion'     => $row['Religion'],
            'psa_num'     => $row['PSA Number'],
            'm_fullname'     => $row['Mother Maiden Fullname'],
            'm_educ'     => $row['Mother Educational Attainment'],
            'm_occu'     => $row['Mother Occupation'],
            'f_fullname'     => $row['Father Fullname'],
            'f_educ'     => $row['Father Educational Attainment'],
            'f_occu'     => $row['Father Occupation'],
            'g_fullname'     => $row['Guardian Fullname'],
            'g_educ'     => $row['Guardian Educational Attainment'],
            'g_occu'     => $row['Guardian Occupation'],
            'pg_contact_num'     => $row['Guardian Contact Number'],
            'l_year_completion'     => $row['Last School Year of Completion'],
            'prev_school'     => $row['Previous School Name'],
            'school_type'     => $row['Previous School Type'],
            'prev_school_ad'     => $row['Previous School Address'],
            'enroll_status'     => 'Pending',
            'transferee'     => $row['Transferee'],
        ]);
    }

    public function rules(): array{
        return [
          '*.LRN' => ['unique:student,lrn']
        ];
    }
}

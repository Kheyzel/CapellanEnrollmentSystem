<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            
            'course_id' => 1,
            'yearlevel_id' => 1,
            'lrn' => 123235654798,
            'last_name' => 'Ayohan',
            'first_name' => 'John Rey',
            'middle_name' => 'Impas',
            'suffix' => '',
            'sex' => 'Male',
            'b_date' => '1999-08-12',
            'contact_num' => '098767654543',
            'email_ad' => 'johnrey@email.com',
            'house_num' => '123 Santol St.',
            'brgy' => 'Lamot 2',
            'city' => 'Calauan',
            'province' => 'Laguna',
            'm_tongue' => 'Tagalog',
            'religion' => 'Catholic',
            'psa_num' => '1123-0090-11454',

            'm_fullname' => 'Agatha Agaro Agape',
            'm_educ' => 'College',
            'm_occu' => 'House Wife',
            'f_fullname' => 'Juan Marco Delacruz',
            'f_educ' => 'Secondary',
            'f_occu' => 'Jeepney Driver',
            'g_fullname' => 'Juan Marco Delacruz',
            'g_educ' => 'Secondary',
            'g_occu' => 'Jeepney Driver',
            'pg_contact_num' => '09272421930',


      
            'l_year_completion' => '2019',
            'prev_school' => 'Dayap National Integrated High School',
            'school_type' => 'Public',
            'prev_school_ad' => 'Brgy. Kanluran Calauan, Laguna',
            'enroll_status' => 'Pending',
            'transferee' => 'No',
        ]);    
        
        DB::table('student')->insert([
            
            'course_id' => 5,
            'yearlevel_id' => 1,
            'lrn' => 123654798254,
            'last_name' => 'Catahan',
            'first_name' => 'Erenz Louie',
            'middle_name' => 'Joyosa',
            'suffix' => '',
            'sex' => 'Male',
            'b_date' => '1999-08-12',
            'contact_num' => '09272421930',
            'email_ad' => 'erenz@email.com',
            'house_num' => '123',
            'brgy' => 'Bayog',
            'city' => 'Los Banos',
            'province' => 'Laguna',
            'm_tongue' => 'Tagalog',
            'religion' => 'Catholic',
            'psa_num' => '1123-0090-11454',

            'm_fullname' => 'Agatha Agaro Agape',
            'm_educ' => 'College',
            'm_occu' => 'House Wife',
            'f_fullname' => 'Juan Marco Delacruz',
            'f_educ' => 'Secondary',
            'f_occu' => 'Jeepney Driver',
            'g_fullname' => 'Juan Marco Delacruz',
            'g_educ' => 'Secondary',
            'g_occu' => 'Jeepney Driver',
            'pg_contact_num' => '09272421930',


            
            'l_year_completion' => '2019',
            'prev_school' => 'Dayap National Integrated High School',
            'school_type' => 'Private',
            'prev_school_ad' => 'Brgy. Kanluran Calauan, Laguna',
            'enroll_status' => 'Pending',
            'transferee' => 'No',
        ]); 

        DB::table('student')->insert([
            
            'course_id' => 1,
            'yearlevel_id' => 1,
            'lrn' => 123654798432,
            'last_name' => 'Nugoy',
            'first_name' => 'Kheyzel',
            'middle_name' => 'Malabanan',
            'suffix' => '',
            'sex' => 'Female',
            'b_date' => '1999-10-15',
            'contact_num' => '09123456789',
            'email_ad' => 'kheyzel@email.com',
            'house_num' => '1501',
            'brgy' => 'Lamot 2',
            'city' => 'Calauan',
            'province' => 'Laguna',
            'm_tongue' => 'Tagalog',
            'religion' => 'Catholic',
            'psa_num' => '1123-0000-00000',

            'm_fullname' => 'Consolacion Nugoy',
            'm_educ' => 'College',
            'm_occu' => 'House Wife',
            'f_fullname' => 'Rogelio Nugoy',
            'f_educ' => 'College',
            'f_occu' => 'Tricycle Driver',
            'g_fullname' => 'Rogelio Nugoy',
            'g_educ' => 'Secondary',
            'g_occu' => 'Jeepney Driver',
            'pg_contact_num' => '09272421930',


         
            'l_year_completion' => '2019',
            'prev_school' => 'Dayap National Integrated High School',
            'school_type' => 'Public',
            'prev_school_ad' => 'Brgy. Kanluran Calauan, Laguna',
            'enroll_status' => 'Pending',
            'transferee' => 'No',
  

        ]);
    }
}

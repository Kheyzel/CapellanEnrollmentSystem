<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->string('student_num')->nullable();
            $table->string('drop_date')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('yearlevel_id');
            $table->string('lrn', 12);
            $table->string('last_name', 32);
            $table->string('first_name', 64);
            $table->string('middle_name', 32)->nullable();
            $table->string('suffix', 32)->nullable();
            
            $table->string('sex', 32);
            $table->string('b_date');

            $table->string('contact_num', 32);
            $table->string('email_ad', 64);
            

            $table->string('house_num', 64);
            $table->string('brgy', 64);
            $table->string('city', 64);
            $table->string('province', 64);

            
            $table->string('m_tongue', 64);
            $table->string('religion', 64);
            $table->string('psa_num', 32)->nullable();        
      
            
            $table->string('m_fullname', 128)->nullable();
            $table->string('m_educ', 64)->nullable();
            $table->string('m_occu', 64)->nullable();

            $table->string('f_fullname', 128)->nullable();
            $table->string('f_educ', 64)->nullable();
            $table->string('f_occu', 64)->nullable();

            $table->string('g_fullname', 128);
            $table->string('g_educ', 64);
            $table->string('g_occu', 64);
            
            $table->string('pg_contact_num', 32);

            $table->string('l_year_completion', 32);
            $table->string('prev_school', 64);
            $table->string('school_type');
            $table->string('prev_school_ad', 128);


            $table->string('enroll_status');
            $table->string('transferee');
            $table->string('school_year')->nullable();
            $table->string('school_year_g12')->nullable();
            $table->string('drop_reason')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}

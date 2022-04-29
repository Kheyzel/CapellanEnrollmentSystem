<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuitionpayment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->double('discount');
            $table->double('payment_amount');
            $table->string('yearlevel_payment', 64);
            $table->string('mode_of_payment', 64)->nullable();
            $table->string('discount_type', 128)->nullable();
            $table->string('payment_method', 64)->nullable();
            $table->string('ref_num', 64)->nullable();

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
        Schema::dropIfExists('tuitionpayment');
    }
}

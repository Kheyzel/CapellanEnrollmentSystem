<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('Form137', 32)->nullable();
            $table->string('Form137_Path')->nullable();
            $table->string('Form137_Document', 128)->nullable();



            $table->string('Form138', 32)->nullable();
            $table->string('Form138_Path')->nullable();
            $table->string('Form138_Document', 128)->nullable();



            $table->string('PSA', 32)->nullable();
            $table->string('PSA_Path')->nullable();
            $table->string('PSA_Document', 128)->nullable();



            $table->string('GoodMoral', 32)->nullable();
            $table->string('GoodMoral_Path')->nullable();
            $table->string('GoodMoral_Document', 128)->nullable();



            $table->string('COC', 32)->nullable();
            $table->string('COC_Path')->nullable();
            $table->string('COC_Document', 128)->nullable();

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
        Schema::dropIfExists('document');
    }
}

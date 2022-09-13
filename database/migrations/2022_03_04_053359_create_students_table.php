<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('course_taken')->nullable();
            $table->integer('course_first_choice')->nullable();
            $table->integer('course_second_choice')->nullable();
            $table->integer('course_third_choice')->nullable();
            $table->string('application_status')->nullable();
            $table->string('student_status')->nullable();
            $table->integer('advised_by')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('students');
    }
}

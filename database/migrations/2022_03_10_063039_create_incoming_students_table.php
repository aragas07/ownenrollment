<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->integer('age');
            $table->boolean('sex');
            $table->string('civil_status');
            $table->string('spouse_name');
            $table->string('spouse_occupation');
            $table->integer('child_number');
            $table->string('r_address');
            $table->string('c_address');
            $table->string('email');
            $table->string('fb_account');
            $table->string('contact_number');
            $table->string('ethnic_group');
            $table->string('religion');
            $table->string('languages');
            $table->boolean('is_working');
            $table->string('working_for');
            $table->string('fathers_name');
            $table->string('fathers_contact_number');
            $table->string('fathers_address');
            $table->string('fathers_employment');
            $table->string('mothers_name');
            $table->string('mothers_contact_number');
            $table->string('mothers_address');
            $table->string('mothers_employment');
            $table->boolean('parents_are');
            $table->integer('family_monthly_income');
            $table->integer('siblings');
            $table->integer('working_siblings');
            $table->integer('college_siblings');
            $table->integer('hs_siblings');
            $table->string('guardian');
            $table->string('guardians_number');
            $table->integer('gen_ability');
            $table->integer('spatial_apt');
            $table->integer('verbal_apt');
            $table->integer('perceptual_apt');
            $table->integer('numerical_apt');
            $table->integer('manual_dex');
            $table->string('form_138');
            $table->string('good_moral');
            $table->string('nso_auth');
            $table->string('marriage_contract');
            $table->string('transcript_records');
            $table->string('transfer_creds');
            $table->string('clearance');
            $table->string('last_sem_grades');
            $table->integer('course_prio')->nullable();
            $table->integer('course_second_prio')->nullable();
            $table->integer('course_third_prio')->nullable();
            $table->boolean('is_accepted')->nullable();
            $table->boolean('is_synced')->nullable();
            $table->boolean('is_advised')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('is_transferee')->nullable();
            $table->boolean('is_old')->nullable();
            $table->timestamp('date_submitted');
            $table->date('date_accepted')->nullable();
            $table->date('date_synced')->nullable();
            $table->date('date_advised')->nullable();
            $table->longText('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_students');
    }
}

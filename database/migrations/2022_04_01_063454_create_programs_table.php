<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institute_id');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->string('full_program_name');
            $table->string('program_code');
            $table->text('description');
            $table->date('effectivity_date');
            $table->date('approval_date');
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
        Schema::dropIfExists('programs');
    }
}

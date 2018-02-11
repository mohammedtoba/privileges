<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingcourses', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('train_desc')->nullable();
            $table->string('train_country')->nullable();
            $table->string('train_workplace')->nullable();
            $table->date('train_startdt')->nullable();
            $table->date('train_enddt')->nullable();       
            $table->string('train_file_upload')->nullable();
            $table->string('train_notes')->nullable() ;
            $table->timestamps();
            
        });
        Schema::table('trainingcourses', function (Blueprint $table) {
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
         });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainingcourses');
    }
}


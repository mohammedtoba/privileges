<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalstaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalstaff', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('second_name_ar')->nullable();
            $table->string('third_name_ar')->nullable();
            $table->string('family_name_ar')->nullable();
            $table->string('full_name_ar')->nullable();
            $table->string('natno')->nullable();
            $table->string('catgno')->nullable();            
            $table->string('depno')->nullable();
            $table->string('jobno')->nullable();
            $table->string('dispno')->nullable();
            $table->string('specno')->nullable() ;
            $table->string('empno')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender', 1)->nullable();
           
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('licence_no')->nullable();
            $table->date('join_date')->nullable();
 
            $table->string('med_actv', 1)->nullable() ;
            $table->timestamps();
    
        });



        Schema::table('medicalstaff', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('catgno')->references('catgno')->on('categories') ;
            $table->foreign('natno')->references('natno')->on('nationalities') ;
            $table->foreign('depno')->references('depno')->on('departments') ;
            $table->foreign('jobno')->references('jobno')->on('jobtypes') ;
            $table->foreign('dispno')->references('dispno')->on('disciplines') ;
            $table->foreign('specno')->references('specno')->on('specialities') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalstaff');
    }
}


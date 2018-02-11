<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobtypes', function (Blueprint $table) {
            $table->string('jobno',10) ;
            $table->string('job_desc',255);
            $table->string('job_desc_ar',255)->nullable();
            $table->string('job_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('jobno') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobtypes');
    }
}

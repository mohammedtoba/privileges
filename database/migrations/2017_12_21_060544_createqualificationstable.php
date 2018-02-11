<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('qualif_desc')->nullable();
            $table->integer('qualif_year')->nullable();
            $table->string('qualif_country')->nullable();
            $table->string('qualif_univ')->nullable();
            $table->string('qual_typ', 10 )->nullable();
            $table->string('qualif_file_upload')->nullable();
            $table->string('qualif_notes')->nullable() ;
            $table->timestamps();
           });
        Schema::table('qualifications', function (Blueprint $table) {
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
            $table->foreign('qual_typ')->references('qual_typ')->on('qualificationtypes') ;
    
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}


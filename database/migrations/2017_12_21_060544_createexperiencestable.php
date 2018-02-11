<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('exper_position')->nullable();
            $table->string('exper_country')->nullable();
            $table->string('exper_workplace')->nullable();
            $table->date('exper_startdt')->nullable();
            $table->date('exper_enddt')->nullable();       
            $table->string('exper_file_upload')->nullable();
            $table->string('exper_notes')->nullable() ;
            $table->timestamps();
            
        });
        Schema::table('experiences', function (Blueprint $table) {
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
        Schema::dropIfExists('experiences');
    }
}


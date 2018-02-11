<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->string('specno',10) ;
            $table->string('spec_desc',255) ;
            $table->string('spec_desc_ar',255)->nullable();
            $table->string('spec_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('specno') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialities');
    }
}

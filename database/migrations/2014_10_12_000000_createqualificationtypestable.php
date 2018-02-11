<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualificationtypes', function (Blueprint $table) {
            $table->string('qual_typ',10) ;
            $table->string('qual_typ_desc',255);
            $table->string('qual_typ_desc_ar',255)->nullable();
            $table->string('qual_typ_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('qual_typ') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualificationtypes');
    }
}

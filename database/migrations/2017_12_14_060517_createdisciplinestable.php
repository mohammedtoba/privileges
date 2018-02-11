<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->string('dispno',2) ;
            $table->string('disp_desc',255) ;
            $table->string('disp_desc_ar',255)->nullable();
            $table->string('disp_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('dispno') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}

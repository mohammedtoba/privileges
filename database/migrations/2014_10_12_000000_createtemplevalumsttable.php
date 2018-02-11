<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplevalumstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templevalumst', function (Blueprint $table) {
            $table->string('templno',10) ;
            $table->string('templ_desc',255);
            $table->string('templ_desc_ar',255)->nullable();
            $table->integer('templ_score' )->nullable();
            $table->string('templ_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('templno') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templevalumst');
    }
}

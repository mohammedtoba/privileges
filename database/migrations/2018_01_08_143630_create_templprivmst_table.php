<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplprivmstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templprivmst', function (Blueprint $table) {
            $table->string('templno',10) ;
            $table->string('templ_desc',255);
            $table->string('templ_desc_ar',255)->nullable();
            $table->string('specno',10)->nullable() ;
            $table->string('templ_actv',1)->nullable();
            $table->integer('prepared_by')->unsigned() ;
            $table->integer('approved_by')->unsigned() ;
            $table->timestamps();   
            $table->primary('templno') ;
        });

        Schema::table('templprivmst', function (Blueprint $table) {
            $table->foreign('prepared_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('templprivmst');
    }
}

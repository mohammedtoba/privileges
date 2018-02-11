<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplprivdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templprivdet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('templno',10) ;
            $table->string('templdetno',10) ;
            $table->string('templdet_desc',255);
            $table->string('templdet_desc_ar',255)->nullable();
            $table->string('catgno')->nullable();  
            $table->string('group_desc',255)->nullable();
            $table->string('proced_code',255)->nullable();
            $table->string('proced_desc',255)->nullable();
            $table->string('templdet_actv',1)->nullable();
            $table->timestamps();   
            /*$table->primary(['templno' , 'templdetno']) ;*/
                      
        });
        Schema::table('templprivdet', function (Blueprint $table) {
            $table->foreign('templno')->references('templno')->on('templprivmst') ;
            $table->foreign('catgno')->references('catgno')->on('categories') ;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templprivdet');
    }
}

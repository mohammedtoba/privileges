<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privStatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',10) ;
            $table->string('desc',30)->nullable() ;
            $table->string('desc_ar',30)->nullable(); 
            $table->integer('sequence',2)->nullable(); 
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privStatus');
    }
}

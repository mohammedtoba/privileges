<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',5) ;
            $table->string('type_desc',30) ;
            $table->string('type_desc_ar',30)->nullable();
            $table->string('type_actv',1)->nullable();
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
        Schema::dropIfExists('privtypes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivdecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privdecisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dec_desc',255) ;
            $table->string('dec_desc_ar',255)->nullable();
            $table->string('dec_actv',1)->nullable();
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
        Schema::dropIfExists('privdecisions');
    }
}

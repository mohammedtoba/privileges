<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('catgno',10) ;
            $table->string('group',255) ;
            $table->string('catg_desc',255) ;
            $table->string('catg_desc_ar',255)->nullable();
            $table->string('catg_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('catgno') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->string('id',10);
            $table->string('depno',10)->nullable();
            $table->string('dept_nam',255);
            $table->string('dept_nam_ar',255)->nullable();
            $table->string('head_userid',255)->nullable();
            $table->string('parent_depno',10)->nullable();
            $table->string('dept_actv',1)->nullable();
            $table->timestamps();   
            $table->primary('id') ;
     });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

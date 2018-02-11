<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffevaluationdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('staffevaluationdet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('templno',10) ;
            $table->string('templdetno',10);
            $table->string('eval_id',10);
            $table->integer('staff_score' )->nullable();
            $table->integer('max_score' )->nullable();
            $table->string('comments',255)->nullable();
            $table->timestamps();
        });
        Schema::table('staffevaluationdet', function (Blueprint $table) {
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
            $table->foreign('templno')->references('templno')->on('templevalumst');           
            $table->foreign('eval_id')->references('id')->on('staffevaluation');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffevaluationdet');
    }
}

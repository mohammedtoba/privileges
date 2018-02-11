<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffevaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('staffevaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('templno',10) ;
            $table->integer('staff_score' )->nullable();
            $table->string('eval_typ',2)->nullable() ;
            $table->integer('overall_rate' )->nullable();
            $table->integer('eval_grade' )->nullable();
            $table->string('recomnd_oppor' )->nullable() ;
            $table->string('recomnd_goals' )->nullable() ;
            $table->string('head_comment' )->nullable() ;
            $table->string('head_sign' )->nullable() ;
            $table->date('head_sign_dat' )->nullable() ;
            $table->string('staff_sign' )->nullable() ;
            $table->date('staff_sign_dat' )->nullable() ;
            $table->timestamps();

     });


        Schema::table('staffevaluation', function (Blueprint $table) {
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
            $table->foreign('templno')->references('templno')->on('templevalumst') ;           
         });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffevaluation');
    }
}

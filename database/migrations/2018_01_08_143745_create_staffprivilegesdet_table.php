<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffprivilegesdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffprivilegesdet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staffpriv_id')->unsigned();
            $table->integer('medstaff_id')->unsigned();
            $table->string('templno',10)->nullable() ;
            $table->string('templdetno',10)->nullable()  ;
            $table->string('specno',10)->nullable() ;
            $table->string('catgno',10)->nullable(); 
            $table->integer('staff_deci_id')->unsigned()->nullable(); 
            $table->string('staff_comment',255)->nullable() ;            
            $table->integer('head_deci_id')->unsigned()->nullable(); 
            $table->string('head_comment',255)->nullable() ;
            $table->integer('committe_deci_id')->unsigned()->nullable(); 
            $table->string('committe_comment',255)->nullable() ;  
            $table->timestamps();
        });

        Schema::table('staffprivilegesdet', function (Blueprint $table) {
            $table->foreign('staffpriv_id')->references('id')->on('staffprivileges')->onDelete('cascade');
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
            $table->foreign('templno')->references('templno')->on('templprivmst') ;
            $table->foreign('templdetno')->references('templdetno')->on('templprivdet') ;
            $table->foreign('specno')->references('specno')->on('specialities') ; 
            $table->foreign('catgno')->references('catgno')->on('categories') ;
            $table->foreign('staff_deci_id')->references('id')->on('privdecitions') ;
            $table->foreign('head_deci_id')->references('id')->on('privdecitions') ;
            $table->foreign('committe_deci_id')->references('id')->on('privdecitions') ;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffprivilegesdet');
    }
}

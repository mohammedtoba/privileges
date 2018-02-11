<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffprivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffprivileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medstaff_id')->unsigned();
            $table->string('templno',10)->nullable() ;
            $table->string('specno',10)->nullable() ;
            $table->string('catgno',10)->nullable();  
            $table->integer('privtyp_id')->unsigned()->nullable();
            $table->integer('priv_status')->unsigned()->nullable() ;   
            $table->dateTime('staff_submit_dt')->nullable() ;
            $table->string('head_comment',255)->nullable() ;
            $table->integer('head_user_id')->nullable() ;             
            $table->dateTime('head_approv_dt')->nullable() ;
            $table->dateTime('head_return_dt')->nullable() ;
            $table->string('committe_comment',255)->nullable() ;
            $table->integer('committee_user_id')->nullable() ;             
            $table->dateTime('committe_approv_dt')->nullable() ;
            $table->dateTime('committe_return_dt')->nullable() ;         
            $table->timestamps();
        });

         Schema::table('staffprivileges', function (Blueprint $table) {
            $table->foreign('medstaff_id')->references('id')->on('medicalstaff')->onDelete('cascade');
            $table->foreign('templno')->references('templno')->on('templprivmst') ;
            $table->foreign('specno')->references('specno')->on('specialities') ;
            $table->foreign('catgno')->references('catgno')->on('categories') ;
            $table->foreign('privtyp_id')->references('id')->on('privtypes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffprivileges');
    }
}

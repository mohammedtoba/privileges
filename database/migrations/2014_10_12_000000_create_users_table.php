<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('email')->unique(); 
            $table->string('password');
            $table->rememberToken();          
            $table->string('usrtype',1)->nullable();
            $table->string('usractv',1)->nullable();
            $table->string('empno')->nullable();
            $table->string('depno')->nullable();
            $table->string('role_id',10)->nullable();
            $table->timestamps();
        });
    
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('depno')->references('id')->on('departments')->onDelete('cascade');
            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

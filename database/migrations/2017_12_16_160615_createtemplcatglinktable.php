<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplcatglinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templcatglink', function (Blueprint $table) {
            $table->string('catgno',10) ;
            $table->string('templno',10) ;
            $table->timestamps();   
            $table->primary(['templno' ,'catgno']) ;
           
        });
        Schema::table('templcatglink', function (Blueprint $table) {
            $table->foreign('catgno')->references('catgno')->on('categories') ;
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
        Schema::dropIfExists('templcatglink');
    }
}



<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplevaludetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('templevaludet', function (Blueprint $table) {
           $table->increments('templdetno',10)->unique();
           $table->string('templno',10);
           $table->string('scope',255);
           $table->string('category',255);
           $table->string('templdet_desc',255);
           $table->string('templdet_desc_ar',255)->nullable();
           $table->integer('templdet_score' )->nullable();
           $table->string('templdet_actv',1)->nullable();
           $table->timestamps();   
                      
        });
        Schema::table('templevaludet', function (Blueprint $table) {
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
        Schema::dropIfExists('templevaludet');
    }
}

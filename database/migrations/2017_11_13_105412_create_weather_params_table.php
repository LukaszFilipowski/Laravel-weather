<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_params', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weather_id')->unsigned();
            $table->string('label');
            $table->string('value');
            $table->timestamps();
            
            $table->foreign('weather_id')->references('id')->on('weathers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_params');
    }
}

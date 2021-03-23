<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('time');
            $table->double('latitude');
            $table->double('longitude');
            $table->double('temp');
            $table->double('pressure');
            $table->double('humidity');
            $table->double('temp_min');
            $table->double('temp_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_information');
    }
}

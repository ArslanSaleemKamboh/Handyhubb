<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_cities', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('city_id');
            $table->timestamps();
        });
        Schema::table('service_cities', function (Blueprint $table) {
           $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
           $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_cities');
    }
}

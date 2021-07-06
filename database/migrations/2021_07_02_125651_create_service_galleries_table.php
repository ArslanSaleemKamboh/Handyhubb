<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_galleries', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->id();
            $table->foreignId('service_id');
            $table->string('pic');
            $table->string('service_attachment');
            // $table->timestamps();
        });
        Schema::table('service_galleries',function(Blueprint $table){
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_galleries');
    }
}

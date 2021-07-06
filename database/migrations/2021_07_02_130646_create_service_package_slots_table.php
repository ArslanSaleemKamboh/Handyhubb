<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePackageSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_package_slots', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('service_id');
            $table->string('title');
            $table->string('price');
            $table->string('time_range');
            $table->string('description');
            $table->integer('status')->comment('0=inActive 1=active');
            $table->integer('admin_satus');
            $table->binary('type');
            $table->timestamps();
        });
        Schema::table('service_package_slots', function (Blueprint $table) {
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
        Schema::dropIfExists('service_package_slots');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_packages', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->foreignId('service_id');
            $table->string('title');
            $table->string('distance');
            $table->string('range');
            $table->string('description');
            $table->integer('status')->comment('0=inactive; 1=active');
            $table->integer('admin_status');
            $table->binary('type');
            $table->timestamps();
        });
        Schema::table('service_packages',function(Blueprint $table){
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
        Schema::dropIfExists('service_packages');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_galleries', function (Blueprint $table) {
            $table->engine= 'InnoDB';
            $table->id();
            $table->foreignId('service_id');
            $table->string('attachment');
            $table->string('service_category');
            // $table->timestamps();
        });
        Schema::table('attachment_galleries',function(Blueprint $table){
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
        Schema::dropIfExists('attachment_galleries');
    }
}

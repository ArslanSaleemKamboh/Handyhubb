<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_reviews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('assistance_request_id')->nullable();
            $table->string('status');
            $table->string('description');
            $table->string('stars');
            $table->string('recommended');
           
            $table->timestamps();
        });
        Schema::table('assistance_reviews',function(Blueprint $table){
            $table->foreign('assistance_request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance_reviews');
    }
}

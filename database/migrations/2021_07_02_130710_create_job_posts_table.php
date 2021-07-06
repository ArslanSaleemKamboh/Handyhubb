<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('location');
            $table->string('salery_range');
            $table->string('requirements');
            $table->string('benefits');
            $table->string('applying_instructions');
            $table->string('min_qualification');
            $table->integer('status')->comment('0=inActive,1=active');
            $table->binary('type');
            $table->timestamps();
        });
        Schema::table('job_posts',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}

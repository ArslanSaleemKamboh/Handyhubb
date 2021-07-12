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
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->string('salary_per_hour')->nullable(); 
            $table->longText('description')->nullable();  
            $table->text('tags')->nullable();  
            $table->integer('status')->comment('0=inActive,1=active');
            $table->string('type');
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

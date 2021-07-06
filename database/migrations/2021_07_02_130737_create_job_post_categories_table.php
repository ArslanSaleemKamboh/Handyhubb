<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_categories', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('job_post_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });
        Schema::table('job_post_categories',function (Blueprint $table){
            $table->foreign('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_post_categories');
    }
}

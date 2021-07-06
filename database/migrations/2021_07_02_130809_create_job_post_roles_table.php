<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_roles', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('job_post_id');
            $table->string('key');
            $table->string('value');
            $table->string('level');
            $table->timestamps();
        });
        Schema::table('job_post_roles', function (Blueprint $table) {
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
        Schema::dropIfExists('job_post_roles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkExperincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_work_experinces', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->foreignId('user_id');
            $table->string('job_title');
            $table->string('company');
            $table->string('year_start');
            $table->string('year_end');
            $table->string('description');
            $table->timestamps();
        });
        Schema::table('user_work_experinces', function (Blueprint $table) {
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
        Schema::dropIfExists('user_work_experinces');
    }
}

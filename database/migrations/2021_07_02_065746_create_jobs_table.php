<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->string('title');
            // $table->string('description');
            // $table->string('phone');
            // $table->string('contact_name');
            // $table->string('street_address');
            // $table->string('city');
            // $table->string('state');
            // $table->string('zipcode');
            // $table->string('logitude');
            // $table->string('latitude');
            // $table->string('end_time');
            // $table->string('compensation');
            // $table->string('comp_type');
            // $table->integer('status')->comment('0=inactive,1=active');
            // $table->binary('type');           
            $table->timestamps();

        });
        // Schema::table('jobs',function(Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

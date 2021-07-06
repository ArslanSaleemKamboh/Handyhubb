<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('company');
            $table->tinyText('licensed');
            $table->tinyText('insured');
            $table->string('policy_number');
            $table->string('phone');
            $table->string('email');
            $table->string('year_form');
            $table->string('website');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('ref_name');
            $table->string('ref_number');
            $table->string('dres_code');
            $table->string('number_of_employ');
            $table->string('response_time');
            $table->string('visit_time');
            $table->string('payment_instruction');
            $table->string('details');
            $table->integer('status')->comment('0=inactive,1=active');
            $table->binary('type');
            $table->timestamps();
        });
        Schema::table('services',function(Blueprint $table){
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
        Schema::dropIfExists('services');
    }
}

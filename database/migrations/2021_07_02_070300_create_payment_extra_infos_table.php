<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentExtraInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_extra_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('payment_info_id')->nullable();
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });
         Schema::table('payment_extra_infos',function(Blueprint $table){
            $table->foreign('payment_info_id')->references('id')->on('payment_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_extra_infos');
    }
}

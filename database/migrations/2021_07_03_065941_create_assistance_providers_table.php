<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistance_providers', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->foreignId('assistance_request_id');
            $table->foreignId('user_id');
            // $table->timestamps();
        });
        Schema::table('assistance_providers', function (Blueprint $table) {
            $table->foreign('assistance_request_id')->references('id')->on('assistance_requests')->onDelete('cascade');
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
        Schema::dropIfExists('assistance_providers');
    }
}

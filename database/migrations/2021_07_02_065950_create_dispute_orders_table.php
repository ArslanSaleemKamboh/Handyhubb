<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispute_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('reason');
            $table->string('detail');
            $table->string('worked_date');
            $table->integer('status')->comment('0=inactive,1=active');
            $table->binary('type');
            $table->timestamps();
        });
        Schema::table('dispute_orders',function(Blueprint $table){
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispute_orders');
    }
}

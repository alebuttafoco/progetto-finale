<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plate_order', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('quantity');
            $table->unsignedBigInteger('plate_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('plate_id')->references('id')->on('plates');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plate_order');
    }
}
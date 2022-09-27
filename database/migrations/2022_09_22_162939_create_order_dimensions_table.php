<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dimensions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->integer('length')->nullable(true);
            $table->integer('width')->nullable(true);
            $table->integer('height')->nullable(true);
            $table->string('units')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_dimensions');
    }
}

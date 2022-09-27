<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderWeightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_weight', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->integer('value')->nullable(true);
            $table->string('units')->nullable(true);
            $table->decimal('WeightUnits')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_weight');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderInternationaloptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_internationaloptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->mediumText('contents')->nullable(true);
            $table->mediumText('nonDelivery')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_internationaloptions');
    }
}

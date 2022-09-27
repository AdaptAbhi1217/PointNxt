<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->mediumText('name')->nullable(true);
            $table->mediumText('company')->nullable(true);
            $table->mediumText('street1')->nullable(true);
            $table->mediumText('street2')->nullable(true);
            $table->mediumText('street3')->nullable(true);
            $table->mediumText('city')->nullable(true);
            $table->mediumText('state')->nullable(true);
            $table->mediumText('postalCode')->nullable(true);
            $table->mediumText('country')->nullable(true);
            $table->mediumText('phone')->nullable(true);
            $table->boolean('residential')->nullable(true);
            $table->mediumText('addressVerified')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_address');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId')->unique();
            $table->string('orderNumber');
            $table->string('orderKey')->nullable(true);;
            $table->string('orderDate')->nullable(true);;
            $table->string('createDate')->nullable(true);;
            $table->string('modifyDate')->nullable(true);;
            $table->string('paymentDate')->nullable(true);;
            $table->string('shipByDate')->nullable(true);;
            $table->string('orderStatus')->nullable(true);;
            $table->bigInteger('customerId')->nullable(true);;
            $table->string('customerUsername')->nullable(true);;
            $table->string('customerEmail')->nullable(true);;
            $table->decimal('orderTotal')->nullable(true);;
            $table->decimal('amountPaid')->nullable(true);;
            $table->decimal('taxAmount')->nullable(true);;
            $table->decimal('shippingAmount')->nullable(true);;
            $table->mediumText('customerNotes')->nullable(true);;
            $table->mediumText('internalNotes')->nullable(true);;
            $table->boolean('gift')->nullable(true);;
            $table->mediumText('giftMessage')->nullable(true);;
            $table->string('paymentMethod')->nullable(true);;
            $table->mediumText('requestShippingService')->nullable(true);;
            $table->string('carrierCode')->nullable(true);;
            $table->string('serviceCode')->nullable(true);;
            $table->string('packageCode')->nullable(true);;
            $table->string('confirmation')->nullable(true);;
            $table->string('shipDate')->nullable(true);;
            $table->string('holdUntilDate')->nullable(true);;
            $table->string('userId')->nullable(true);;
            $table->mediumText('externallyFulfilledBy')->nullable(true);;
            $table->boolean('externallyFulfilled')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

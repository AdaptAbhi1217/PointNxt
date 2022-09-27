<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->biginteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->integer('orderItemId')->unique();
            $table->text('lineItemKey')->nullable(true);
            $table->text('sku')->nullable(true);
            $table->text('name')->nullable(true);
            $table->text('imageUrl')->nullable(true);
            $table->decimal('quantity')->nullable(true);
            $table->decimal('unitPrice')->nullable(true);
            $table->decimal('taxAmount')->nullable(true);
            $table->decimal('shippingAmount')->nullable(true);
            $table->mediumText('warehouseLocation')->nullable(true);
            $table->integer('productId')->nullable(true);
            $table->text('fulfillmentSku')->nullable(true);
            $table->boolean('adjustment')->nullable(true);
            $table->string('upc')->nullable(true);
            $table->string('createDate')->nullable(true);
            $table->string('modifyDate')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderitems');
    }
}

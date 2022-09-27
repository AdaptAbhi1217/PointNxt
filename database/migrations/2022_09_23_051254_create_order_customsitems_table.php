<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCustomsitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customsitems', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('orderId');
			$table->foreign('orderId')->references('orderId')->on('orders');
            $table->mediumText('customsItemId');
            $table->mediumText('description')->nullable(true);
            $table->integer('quantity')->nullable(true);
            $table->integer('value')->nullable(true);
            $table->mediumText('harmonizedTariffCode')->nullable(true);
            $table->mediumText('countryOfOrigin')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_customsitems');
    }
}

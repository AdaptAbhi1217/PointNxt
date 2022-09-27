<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAdvancedoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_advancedoptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderId');
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->integer('warehouseId')->nullable(true);
            $table->boolean('nonMachinable')->nullable(true);
            $table->boolean('saturdayDelivery')->nullable(true);
            $table->boolean('containsAlcohol')->nullable(true);
            $table->integer('storeId')->nullable(true);
            $table->mediumText('customField1')->nullable(true);
            $table->mediumText('customField2')->nullable(true);
            $table->mediumText('customField3')->nullable(true);
            $table->mediumText('source')->nullable(true);
            $table->boolean('mergedOrSplit')->nullable(true);
            $table->integer('parentId')->nullable(true);
            $table->text('billToParty')->nullable(true);
            $table->text('billToAccount')->nullable(true);
            $table->text('billToPostalCode')->nullable(true);
            $table->text('billToCountryCode')->nullable(true);
            $table->text('billToMyOtherAccount')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_advancedoptions');
    }
}

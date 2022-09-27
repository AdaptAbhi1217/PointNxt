<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('productId')->unique();
            $table->mediumText('aliases')->nullable(true);
            $table->mediumText('sku')->nullable(true);
            $table->mediumText('name')->nullable(true);
            $table->decimal('defaultCost')->nullable(true);
            $table->decimal('price')->nullable(true);
            $table->decimal('length')->nullable(true);
            $table->decimal('width')->nullable(true);
            $table->decimal('height')->nullable(true);
            $table->decimal('weightOz')->nullable(true);
            $table->longText('internalNotes')->nullable(true);
            $table->mediumText('fulfillmentSku')->nullable(true);
            $table->mediumText('createDate');
            $table->mediumText('modifyDate')->nullable(true);
            $table->boolean('active');
            $table->mediumText('productType')->nullable(true);
            $table->mediumText('warehouseLocation')->nullable(true);
            $table->mediumText('defaultCarrierCode')->nullable(true);
            $table->mediumText('defaultServiceCode')->nullable(true);
            $table->mediumText('defaultPackageCode')->nullable(true);
            $table->mediumText('defaultIntlCarrierCode')->nullable(true);
            $table->mediumText('defaultIntlServiceCode')->nullable(true);
            $table->mediumText('defaultIntlPackageCode')->nullable(true);
            $table->mediumText('defaultConfirmation')->nullable(true);
            $table->mediumText('defaultIntlConfirmation')->nullable(true);
            $table->mediumText('customsDescription')->nullable(true);
            $table->decimal('customsValue')->nullable(true);
            $table->mediumText('customsTarriffNo')->nullable(true);
            $table->mediumText('customsCountryCode')->nullable(true);
            $table->boolean('noCustoms')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

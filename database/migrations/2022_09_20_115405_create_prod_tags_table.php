<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('productId');
            $table->foreign('productId')->references('productId')->on('products');
            $table->integer('tagId')->nullable(true);
            $table->string('name')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_tags');
    }
}

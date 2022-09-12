<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants_client', function (Blueprint $table) {
            $table->id();
            $table->integer('product_variant_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->json('vriants');
            $table->double('price');
            $table->double('selling_price');
            $table->double('global_price');
            $table->integer('qty');
            $table->string('sku');
            $table->string('photo');
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variants_client');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_product_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('store_product_id');
            $table->string('name');
            $table->string('locale');
            $table->text('description');
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_product_translations');
    }
}

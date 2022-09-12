<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProductTranslations extends Migration
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
            $table->integer('store_prodcut_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->foreign('store_prodcut_id')->references('id')->on('store_products')->onDelete('cascade');
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

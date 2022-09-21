<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStoreProductIdColumToProductVariantsClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variants_client', function (Blueprint $table) {
            $table->integer('store_product_id')->unsigned()->after('id')->nullable();
            $table->foreign('store_product_id')->references('id')->on('store_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variants_client', function (Blueprint $table) {
            //
        });
    }
}

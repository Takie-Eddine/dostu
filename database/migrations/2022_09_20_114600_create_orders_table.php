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
            //$table->foreignId('store_product_id')->references('id')->on('store_products');
            $table->foreignId('store_id')->references('id')->on('stores');
            // $table->string('first_name');
            // $table->string('last_name');
            // $table->string('phone_number');
            // $table->string('address');
            $table->string('number')->unique();
            $table->enum('status',['pending','processing','delivering','complated','canceled'])->default('pending');
            $table->enum('payment_status',['paid','failed','pending'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}

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
            $table->unsignedBigInteger('client_id');
            $table->tinyInteger('status')->default(1);
            $table->float('total_amount');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('shipping_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('shipping_id')->references('id')->on('shippings');
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

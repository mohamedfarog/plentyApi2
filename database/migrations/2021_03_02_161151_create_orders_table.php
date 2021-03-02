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
            $table->string('ref');
            $table->double('total_amount')->default(0.0);
            $table->double('amount_due')->default(0.0);
            $table->unsignedBigInteger('order_status');
            $table->string('payment_method')->default('cash');
            $table->double('tax')->nullable();
            $table->double('delivery_charge')->default(0.0);
            $table->string('delivery_location');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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

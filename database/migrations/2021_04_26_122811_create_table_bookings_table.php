<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->date('date')->nullable();
            $table->time('preftime')->nullable();
            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id')->references('id')->on('shoptables');
            $table->string('status')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('amount_due')->nullable();
            $table->double('coupon_value')->nullable();
            $table->double('points')->nullable();
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
        Schema::dropIfExists('table_bookings');
    }
}

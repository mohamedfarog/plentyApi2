<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('carts', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('pid');
        //     $table->foreign('pid')->references('id')->on('products');
        //     $table->integer('quantity');
        //     $table->string('image')->nullable();
        //     $table->string('category')->nullable();
        //     $table->string('name');
        //     $table->double('price');
        //     $table->string('key')->nullable();
        //     $table->string('size')->nullable();
        //     $table->unsignedBigInteger('shop_id')->nullable();
        //     $table->foreign('shop_id')->references('id')->on('shops');
        //     $table->string('date')->nullable();
        //     $table->string('time')->nullable();
        //     $table->string('fsize')->nullable();
        //     $table->string('fcolor')->nullable();
        //     $table->string('fsizename')->nullable();
        //     $table->string('fcolorname')->nullable();
        //     $table->unsignedBigInteger('timeslot_id')->nullable();
        //     $table->foreign('timeslot_id')->references('id')->on('timeslots');

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

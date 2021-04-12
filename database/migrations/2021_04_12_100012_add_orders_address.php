<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('delivery_note',500)->nullable();
            $table->string('contact_number')->nullable();
            $table->string('city')->nullable();
            $table->string('label')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->dropColumn('delivery_note');
            $table->dropColumn('contact_number');
            $table->dropColumn('city');
            $table->dropColumn('label');

        });
    }
}

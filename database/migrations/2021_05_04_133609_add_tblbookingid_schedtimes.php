<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblbookingidSchedtimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sched_times', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('table_booking_id')->nullable();
            $table->foreign('table_booking_id')->references('id')->on('table_bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sched_times', function (Blueprint $table) {
            //
        });
    }
}

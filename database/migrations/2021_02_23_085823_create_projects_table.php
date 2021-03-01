<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('otp');
            $table->double('registerpts')->default(0.0);
            $table->double('transpts')->default(0.0);
            $table->double('invitepts')->default(0.0);
            $table->double('dailypts')->default(0.0);
            $table->double('streakpts')->default(0.0);
            $table->double('others')->default(0.0);
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
        Schema::dropIfExists('projects');
    }
}

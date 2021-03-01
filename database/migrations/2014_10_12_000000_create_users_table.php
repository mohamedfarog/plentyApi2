<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('contact')->unique();
            $table->string('eid')->nullable();
            $table->string('passport')->nullable();
            $table->string('others')->nullable();
            $table->string('apple_id')->nullable();
            $table->string('google_id')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('verified')->default(0);
            $table->string('typeofuser')->default('U');
            $table->string('gender')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

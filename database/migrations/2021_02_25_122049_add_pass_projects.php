<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPassProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->string('passldesc')->nullable();
            $table->string('passadesc')->nullable();

            $table->string('passorgname')->nullable();
            $table->string('passtypeid')->nullable();
            $table->string('passserial')->nullable();
            $table->string('teamid')->nullable();
            $table->string('barcodeformat')->default('PKBarcodeFormatQR');
            $table->string('barcodemsgencoding')->default('utf-8');
            $table->string('loyaltyfcolor')->default('rgb(37,48,108)');
            $table->string('loyaltybcolor')->default('rgb(250, 243, 241)');
            $table->string('accessfcolor')->default('rgb(37,48,108)');
            $table->string('accessbcolor')->default('rgb(250, 243, 241)');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}

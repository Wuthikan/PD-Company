<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping', function (Blueprint $table) {
            $table->text('distance')->nullable();
            $table->text('licenseplate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping', function (Blueprint $table) {
          $table->dropColumn('distance');
          $table->dropColumn('licenseplate');
        });
    }
}

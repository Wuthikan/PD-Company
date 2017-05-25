<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_product', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idproduct')->unsigned()->index();
          $table->foreign('idproduct')
                          ->references('id')
                          ->on('product')
                          ->onDelete('cascade');
          $table->integer('idboxconcrete')->unsigned()->index();
          $table->foreign('idboxconcrete')
                          ->references('id')
                          ->on('box_concrette')
                          ->onDelete('cascade');
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
        Schema::dropIfExists('reserve_product');
    }
}

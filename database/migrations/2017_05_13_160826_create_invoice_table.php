<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->text('code')->nullable();
            $table->integer('idcustomer')->unsigned()->nullable();
            $table->foreign('idcustomer')
                            ->references('id')
                            ->on('customer');
            $table->integer('idemployee')->unsigned()->default(1)->nullable();
            $table->foreign('idemployee')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade');
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->integer('type');
            $table->integer('payment');
            $table->integer('shipping');

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
        Schema::dropIfExists('invoice');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->text('code')->nullable();
            $table->text('name');
            $table->integer('idextra')->unsigned()->default(1);
            $table->foreign('idextra')
                            ->references('id')
                            ->on('extra_concrette')
                            ->onDelete('cascade');
            $table->double('width');
            $table->double('height');
            $table->double('amount');
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
        Schema::dropIfExists('order');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcretteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concrette', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idinvoice')->unsigned()->default(1);
            $table->foreign('idinvoice')
                            ->references('id')
                            ->on('invoice')
                            ->onDelete('cascade');
            $table->double('amount');
            $table->double('price');
            $table->double('shipping')->nullable();
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
        Schema::dropIfExists('concrette');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxConcretteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_concrette', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idinvoice')->unsigned()->default(1);

            $table->integer('idproduct')->unsigned()->default(1);

            $table->double('amount');
            $table->double('height');
            $table->double('price');
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
        Schema::dropIfExists('box_concrette');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraConcretteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_concrette', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idinvoice')->unsigned()->default(1);
            $table->foreign('idinvoice')
                            ->references('id')
                            ->on('invoice')
                            ->onDelete('cascade');
            $table->text('name');
            $table->double('height');
            $table->double('price');
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
        Schema::dropIfExists('extra_concrette');
    }
}

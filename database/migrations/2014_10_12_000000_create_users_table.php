<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->Integer('class')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('pic_signature')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
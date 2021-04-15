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
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->date('date');
            $table->date('date_start');
            $table->date('date_left');
            $table->string('subtotal');
            $table->string('total');
            $table->integer('homeservice');
            $table->integer('active');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->timestamps();
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
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
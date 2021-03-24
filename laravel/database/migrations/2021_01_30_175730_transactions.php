<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->String('card')->nullable();
            $table->String('card_date')->nullable();
            $table->String('cvv')->nullable();
            $table->String('paypal_account')->unique()->nullable();
            $table->String('date');
            $table->String('invoice')->unique();
            $table->String('owner_name');
            $table->unsignedBigInteger('reservation_id');
            $table->timestamps();
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->unsignedInteger('number');
            $table->unsignedInteger('number_int')->nullable();
            $table->string('suburb');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('address', function (Blueprint $table){
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('address');
    }
}

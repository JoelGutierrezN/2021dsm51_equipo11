<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('first_name', 255);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('cellphone');
            $table->string('phone')->nullable($value = true);
            $table->string('rank', 255);
            $table->string('img', 255)->nullable();
            $table->unsignedInteger('active');
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

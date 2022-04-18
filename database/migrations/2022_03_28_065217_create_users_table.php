<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name_users');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('sex_users');
            $table->date('created_at_time_users');
            $table->string('address_users');
            $table->integer('phone_users');
            $table->bigInteger('id_dpms')->unsigned();
            $table->foreign('id_dpms')->references('id')->on('departments');
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
};
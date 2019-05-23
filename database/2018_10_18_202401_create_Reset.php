<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Email');
            $table->string('Q1');
            $table->string('Q1A');
            $table->string('Q2');
            $table->string('Q2A');
            $table->string('Q3');
            $table->string('Q3A');
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
        Schema::dropIfExists('Reset');
    }
}

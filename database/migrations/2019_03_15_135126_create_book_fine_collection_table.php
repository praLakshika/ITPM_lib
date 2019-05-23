<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookFineCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_fine_collection', function (Blueprint $table) {
            $table->increments('id');
            $table->string('delayed_days');
            $table->string('fine_fee_id');
            $table->string('book_issued_id');
            $table->string('find_fee');
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
        Schema::dropIfExists('book_fine_collection');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_id');
            $table->string('member_id');
            $table->string('getdate');
            $table->string('book_issued_day');
            $table->string('book_returned_day')->nullable();
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
        Schema::dropIfExists('book_issue');
    }
}

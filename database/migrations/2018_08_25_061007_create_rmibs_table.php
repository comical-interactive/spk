<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRmibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rmibs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_id');
            $table->dateTime('test_date')->nullable();
            $table->string('test_taker_index');
            $table->string('test_taker_name');
            $table->string('test_taker_number');
            $table->string('test_taker_sex');
            $table->integer('test_taker_age');
            $table->string('a_answers');
            $table->string('b_answers');
            $table->string('c_answers');
            $table->string('d_answers');
            $table->string('e_answers');
            $table->string('f_answers');
            $table->string('g_answers');
            $table->string('h_answers');
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
        Schema::dropIfExists('rmibs');
    }
}

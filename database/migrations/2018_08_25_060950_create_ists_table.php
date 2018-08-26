<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_id');
            $table->dateTime('test_date')->nullable();
            $table->integer('test_taker_index');
            $table->string('test_taker_number');
            $table->string('test_taker_name');
            $table->string('test_taker_first_choice');
            $table->string('test_taker_second_choice');
            $table->integer('test_taker_age');
            $table->string('test_taker_sex');
            $table->string('se_answers');
            $table->string('wa_answers');
            $table->string('an_answers');
            $table->string('ge_answers');
            $table->string('ra_answers');
            $table->string('zr_answers');
            $table->string('fa_answers');
            $table->string('wu_answers');
            $table->string('me_answers');
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
        Schema::dropIfExists('ists');
    }
}

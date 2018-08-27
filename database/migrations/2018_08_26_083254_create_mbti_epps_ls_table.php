<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMbtiEppsLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_epps_ls', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_id');
            $table->dateTime('test_date')->nullable();
            $table->string('test_taker_index');
            $table->string('test_taker_number');
            $table->string('test_taker_name');
            $table->string('test_taker_age');
            $table->string('test_taker_sex');
            $table->string('mbti1_answers');
            $table->string('mbti2_answers');
            $table->string('epps1_answers');
            $table->string('epps2_answers');
            $table->string('ls_answers');
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
        Schema::dropIfExists('mbti_epps_ls');
    }
}

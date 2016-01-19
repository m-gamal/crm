<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('line_id')->unsigned();
            $table->integer('am_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('area', function ($table) {
            // Constraints
            $table->foreign('line_id')->references('id')->on('line');
            $table->foreign('am_id')->references('id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

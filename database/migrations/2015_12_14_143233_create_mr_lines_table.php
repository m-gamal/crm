<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMrLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mr_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mr_id')->unsigned();
            $table->integer('line_id')->unsigned();
            $table->string('from');
            $table->string('to')->nullable();
            $table->timestamps();
        });

        Schema::table('mr_lines', function ($table) {
            // Constraints
            $table->foreign('mr_id')->references('id')->on('employee');
            $table->foreign('line_id')->references('id')->on('line');
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

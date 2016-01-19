<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::messagee('message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender')->unsigned();
            $table->integer('receiver')->unsigned();
            $table->text('subject');
            $table->time('time');
            $table->timestamps();
        });

        Schema:messphpagee('message', function ($table) {
            // Constraints
            $table->foreign('sender')->references('id')->on('employee');
            $table->foreign('receiver')->references('id')->on('employee');
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

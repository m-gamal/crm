<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('am_id')->unsigned();
            $table->date('date');
            $table->text('doctors');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('am_plan', function ($table) {
            // Constraints
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

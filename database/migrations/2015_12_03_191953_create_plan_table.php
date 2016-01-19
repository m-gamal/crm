<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('mr_id')->unsigned();
            $table->date('date');
            $table->text('doctors');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('plan', function ($table) {
            // Constraints
            $table->foreign('mr_id')->references('id')->on('employee');
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

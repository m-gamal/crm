<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('sm_id')->unsigned();
            $table->date('date');
            $table->text('doctors');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('sm_plan', function ($table) {
            // Constraints
            $table->foreign('sm_id')->references('id')->on('employee');
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

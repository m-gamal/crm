<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmExpenseReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_expense_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('am_id')->unsigned();
            $table->date('date');
            $table->string('serial');
            $table->string('hotel');
            $table->text('meals');
            $table->string('city');
            $table->float('cost', 11, 2);
            $table->text('group_meeting');
            $table->text('used_facilities');
            $table->text('description');
            $table->float('total', 11, 2);
            $table->timestamps();
        });

        Schema::table('am_expense_report', function ($table) {
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

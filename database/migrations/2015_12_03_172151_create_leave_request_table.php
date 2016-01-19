<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('emp_id')->unsigned();
            $table->date('date');
            $table->text('reason');
            $table->date('leave_start');
            $table->date('leave_end');
            $table->integer('count');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('leave_request', function ($table) {
            // Constraints
            $table->foreign('emp_id')->references('id')->on('employee');
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

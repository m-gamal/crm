<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmLeaveRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_leave_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('sm_id')->unsigned();
            $table->date('date');
            $table->text('reason');
            $table->date('leave_start');
            $table->date('leave_end');
            $table->integer('count');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('sm_leave_request', function ($table) {
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

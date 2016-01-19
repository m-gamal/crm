<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('emp_id')->unsigned();
            $table->date('date');
            $table->text('request_text');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('service_request', function ($table) {
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

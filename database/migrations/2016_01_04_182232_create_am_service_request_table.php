<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmServiceRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_service_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('am_id')->unsigned();
            $table->date('date');
            $table->text('request_text');
            $table->boolean('approved')->nullable();
            $table->timestamps();
        });

        Schema::table('am_service_request', function ($table) {
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

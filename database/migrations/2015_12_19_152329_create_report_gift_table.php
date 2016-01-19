<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportGiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_gift', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->unsigned();
            $table->integer('gift_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('report_gift', function ($table) {
            // Constraints
            $table->foreign('report_id')->references('id')->on('report');
            $table->foreign('gift_id')->references('id')->on('gift');
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

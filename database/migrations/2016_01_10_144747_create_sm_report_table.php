<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('sm_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->date('date');
            $table->text('promoted_products');
            $table->text('samples_products');
            $table->text('sold_products');
            $table->float('total_sold_products_price', 11, 3);
            $table->text('gifts');
            $table->text('feedback');
            $table->text('follow_up');
            $table->float('lat', 11, 6);
            $table->float('lon', 11, 6);
            $table->timestamps();
        });

        Schema::table('sm_report', function ($table) {
            // Constraints
            $table->foreign('sm_id')->references('id')->on('employee');
            $table->foreign('doctor_id')->references('id')->on('customer');
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

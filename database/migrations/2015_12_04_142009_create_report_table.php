<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('mr_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->date('date');
            $table->text('promoted_products');
            $table->text('samples_products');
            $table->text('sold_products');
            $table->float('total_sold_products_price', 11, 3);
            $table->text('gifts');
            $table->text('feedback');
            $table->text('follow_up');
            $table->integer('double_visit_manager_id')->nullable()->unsigned();
            $table->boolean('is_planned');
            $table->float('lat', 11, 6);
            $table->float('lon', 11, 6);
            $table->timestamps();
        });

        Schema::table('report', function ($table) {
            // Constraints
            $table->foreign('mr_id')->references('id')->on('employee');
            $table->foreign('double_visit_manager_id')->references('id')->on('employee');
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

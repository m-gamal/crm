<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->enum('class', ['A+', 'A', 'B', 'C']);
            $table->enum('description', ['clinic', 'polyclinic', 'hospital', 'pharmacy', 'medical_center'])->nullable();
            $table->string('description_name')->nullable();
            $table->enum('specialty', ['GYN', 'IM', 'GP', 'Surg', 'Orth', 'Ped', 'Ophth', 'VS']);
            $table->string('mobile')->nullable();
            $table->string('clinic_tel')->nullable();
            $table->text('address')->nullable();
            $table->text('address_description')->nullable();
            $table->time('am_working')->nullable();
            $table->time('time_of_visit')->nullable();
            $table->text('comment')->nullable();
            $table->integer('mr_id')->unsigned();
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::table('customer', function ($table) {
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

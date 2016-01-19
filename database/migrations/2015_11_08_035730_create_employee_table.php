<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('line_id')->nullable()->unsigned();
            $table->integer('manager_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('email');
            $table->integer('level_id')->nullable()->unsigned();
            $table->date('hiring_date')->nullable();
            $table->date('leaving_date')->nullable();;
            $table->boolean('active');
            $table->string('password');
            $table->timestamps();
        });

        Schema::table('employee', function ($table) {
            // Constraints
            $table->foreign('line_id')->references('id')->on('line');
            $table->foreign('level_id')->references('id')->on('level');
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

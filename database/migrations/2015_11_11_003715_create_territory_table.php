<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerritoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('area_id')->unsigned();
            $table->integer('mr_id')->unsigned();
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('territory', function ($table) {
            // Constraints
            $table->foreign('area_id')->references('id')->on('area');
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

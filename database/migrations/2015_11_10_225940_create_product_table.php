<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('form_id')->unsigned();
            $table->integer('line_id')->unsigned();
            $table->float('unit_price', 11, 3);
            $table->timestamps();
        });

        Schema::table('product', function ($table) {
            // Constraints
            $table->foreign('line_id')->references('id')->on('line');
            $table->foreign('form_id')->references('id')->on('form');
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

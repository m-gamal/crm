<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->integer('code');
            $table->string('product_name');
            $table->string('area');
            $table->string('quantity')->nullable();
            $table->json('mrs_percents')->nullable();
            $table->timestamps();
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

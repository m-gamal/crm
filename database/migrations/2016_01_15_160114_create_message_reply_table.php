<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('msg_id')->unsigned();
            $table->integer('sender')->unsigned();
            $table->text('text');
            $table->boolean('is_attachment');
            $table->boolean('is_read')->nullable();
            $table->time('time');
            $table->timestamps();
        });

        Schema::table('message_reply', function ($table) {
            // Constraints
            $table->foreign('sender')->references('id')->on('employee');
            $table->foreign('msg_id')->references('id')->on('message');
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

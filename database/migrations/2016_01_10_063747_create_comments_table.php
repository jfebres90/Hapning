<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('user_id')->unsigned();
            $table->string('comment_title', 20);
            $table->text('comment_text');
            $table->integer('event_id')->unsigned();
            $table->timestamps('date_posted');////
        });

        Schema::table('comments', function($table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('event_id')->on('events');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}

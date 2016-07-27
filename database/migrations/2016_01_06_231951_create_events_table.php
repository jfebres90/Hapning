<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->increments('event_id')->unsigned();
            $table->string('event_title', 30);
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->text('description');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('time');
            $table->string('tags');
            $table->timestamps('date_posted');


        });

        Schema::table('events', function($table) {


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}

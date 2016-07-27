<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('country','2');
            $table->string('postal_code','20');
            $table->string('city','20');
            $table->string('state','100');
            $table->string('state_abbrev','20');
            $table->string('county','100');
            $table->string('county_abbrev','20');
            $table->string('community','100');
            $table->string('community_code','20');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE cities ADD location POINT' );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cities');
    }
}

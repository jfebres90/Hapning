exit
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_name', 20)->unique();
            $table->string('email', 30)->unique();
            $table->string('password', 60);
            $table->string('first_name',15);
            $table->string('last_name', 15);
            $table->rememberToken();
            $table->timestamps('date_joined');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

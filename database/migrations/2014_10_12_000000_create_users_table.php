<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('email2')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('aboutMe')->nullable();
            $table->string('credits')->nullable();
            $table->integer('ranking')->nullable();
            $table->integer('role_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->boolean('privacy_policy')->default(false);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

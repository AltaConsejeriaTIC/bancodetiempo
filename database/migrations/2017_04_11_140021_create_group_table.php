<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('creator_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('groups', function($table)
        {
          $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

          $table->foreign('admin_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('groups');
    }
}

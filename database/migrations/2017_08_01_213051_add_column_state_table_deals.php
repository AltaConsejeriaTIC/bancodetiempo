<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStateTableDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->integer('state_id')->unsigned();
            $table->integer('creator_id')->unsigned();
        });

        Schema::table('deals', function($table)
        {
          $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');
        $table->foreign('creator_id')
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

        Schema::table('deals', function(Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropColumn('state_id');
            $table->dropForeign(['creator_id']);
            $table->dropColumn('creator_id');
       });
    }
}

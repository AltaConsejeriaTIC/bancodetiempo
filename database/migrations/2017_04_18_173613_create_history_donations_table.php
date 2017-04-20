<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('history_donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->integer('credits');
            $table->timestamps();
        });

        Schema::table('history_donations', function($table)
        {
          $table->foreign('donor_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

          $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
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
        Schema::dropIfExists('history_donations');
    }
}

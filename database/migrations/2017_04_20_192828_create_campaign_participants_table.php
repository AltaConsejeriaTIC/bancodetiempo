<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id')->unsigned();
            $table->integer('campaigns_id')->unsigned();
            $table->boolean('confirmed');
            $table->timestamps();
        });

        Schema::table('campaign_participants', function($table)
        {
          $table->foreign('campaigns_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('cascade');

          $table->foreign('participant_id')
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
        Schema::dropIfExists('campaign_participants');
    }
}

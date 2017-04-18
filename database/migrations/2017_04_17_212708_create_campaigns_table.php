<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('groups_id')->unsigned();
            $table->integer('quotas');
            $table->integet('category_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->integer('state_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('campaigns', function($table)
        {
          $table->foreign('groups_id')
                ->references('id')
                ->on('groups')
                ->onUpdate('cascade');

          $table->foreign('state_id')
                ->references('id')
                ->on('states')
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
        Schema::dropIfExists('campaigns');
    }
}

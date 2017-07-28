<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCampaignReports extends Migration
{
    public function up()
    {
        Schema::create('campaign_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('type_report_id')->unsigned();
            $table->string('observation',250)->nullable();
            $table->timestamps();
        });

        Schema::table('campaign_reports', function($table)
        {
            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onUpdate('cascade');

            $table->foreign('type_report_id')
                ->references('id')
                ->on('type_reports')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaign_reports');
    }
}

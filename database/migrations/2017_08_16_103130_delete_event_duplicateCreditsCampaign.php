<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteEventDuplicateCreditsCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP EVENT IF EXISTS `Campaign`");
        DB::unprepared("DROP PROCEDURE IF EXISTS `duplicateCreditsCampaign`");
        DB::unprepared("DROP EVENT IF EXISTS `changeToFinishDeal`");
        DB::unprepared("DROP PROCEDURE IF EXISTS `finishDeal`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

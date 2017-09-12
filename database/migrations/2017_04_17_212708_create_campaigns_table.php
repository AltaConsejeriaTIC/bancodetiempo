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
            $table->integer('hours');
            $table->integer('category_id')->unsigned();
            $table->integer('credits');
            $table->dateTime('date');
            $table->dateTime('date_donations');
            $table->integer('state_id')->unsigned();
            $table->boolean('allows_registration')->default(0);
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

        DB::unprepared("CREATE PROCEDURE `duplicateCreditsCampaign`()
        BEGIN
        DECLARE campaign INT;
        DECLARE credit INT;
        DECLARE cursor1 CURSOR FOR SELECT id, credits FROM campaigns WHERE date_donations <= NOW() and allows_registration = 0;

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO campaign, credit;
				UPDATE campaigns SET credits = credit*2, allows_registration = 1 WHERE id = campaign;

        END LOOP c1_loop;

        CLOSE cursor1;

        END");

        DB::unprepared("CREATE EVENT `Campaign` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-02-28 00:00:00' ENDS '2025-05-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `duplicateCreditsCampaign`()");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');

        DB::unprepared("DROP EVENT IF EXISTS `Campaign`");

        DB::unprepared("DROP PROCEDURE IF EXISTS `duplicateCreditsCampaign`");
    }
}

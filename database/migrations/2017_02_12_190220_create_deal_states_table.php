<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deal_id')->unsigned();
            $table->integer('state_id')->unsigned();            
            $table->timestamps();
        });

        DB::unprepared("CREATE PROCEDURE `changeDealForRating`(OUT `trato` INT, OUT `estado` INT)
        BEGIN

        DECLARE cursor1 CURSOR FOR SELECT id FROM deals WHERE date >= curdate() AND time <= CURTIME();

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO trato;

            SELECT state_id INTO estado FROM deal_states WHERE deal_id = trato ORDER BY id DESC LIMIT 0,1;
            IF estado = 7 THEN INSERT INTO deal_states (deal_id, state_id,created_at ,updated_at) VALUES (trato, 12,NOW(), NOW()); END IF;

        END LOOP c1_loop;

        CLOSE cursor1;

        END");

        DB::unprepared("CREATE EVENT `dealForRating` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-02-28 00:00:00' ENDS '2025-05-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `changeDealForRating`(@p0, @p1)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deal_states');

        DB::unprepared("DROP EVENT IF EXISTS `dealForRating`");

        DB::unprepared("DROP PROCEDURE IF EXISTS `changeDealForRating");
    }
}

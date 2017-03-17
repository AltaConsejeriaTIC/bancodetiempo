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

        DECLARE cursor1 CURSOR FOR SELECT id FROM deals WHERE date <= curdate() AND time <= CURTIME();

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO trato;

            SELECT state_id INTO estado FROM deal_states WHERE deal_id = trato ORDER BY id DESC LIMIT 0,1;
            IF estado = 7 THEN INSERT INTO deal_states (deal_id, state_id,created_at ,updated_at) VALUES (trato, 12,NOW(), NOW()); END IF;

        END LOOP c1_loop;

        CLOSE cursor1;

        END");

        DB::unprepared("CREATE PROCEDURE `finishDeal`(OUT `trato` INT, OUT `estado` INT)
        BEGIN

        DECLARE cursor1 CURSOR FOR SELECT id FROM deals WHERE date = ADDDATE(CURDATE(), INTERVAL -3 DAY) AND time <= CURTIME();

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO trato;

            SELECT state_id INTO estado FROM deal_states WHERE deal_id = trato ORDER BY id DESC LIMIT 0,1;
            IF estado = 12 THEN INSERT INTO deal_states (deal_id, state_id,created_at ,updated_at) VALUES (trato, 10,NOW(), NOW()); END IF;

        END LOOP c1_loop;

        CLOSE cursor1;

        END");

        DB::unprepared('CREATE PROCEDURE `refuseDeal`(OUT `trato` INT, OUT `estado` INT)
        BEGIN
        DECLARE conversation TEXT;
        DECLARE json TEXT;
        DECLARE applicant TEXT;
        DECLARE cursor1 CURSOR FOR SELECT id FROM deals WHERE DATE(created_at) <= ADDDATE(CURDATE(), INTERVAL -3 DAY) AND TIME(created_at) <= CURTIME() OR (date >= CURDATE() AND time >= CURTIME());

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO trato;

            SELECT state_id INTO estado FROM deal_states WHERE deal_id = trato ORDER BY id DESC LIMIT 0,1;
            SELECT conversations_id INTO conversation FROM deals WHERE id = trato;
            SELECT user_id INTO applicant FROM deals WHERE id = trato;
            SELECT message INTO json FROM conversations WHERE id = conversation;
            IF estado = 4 THEN SET json = '.
                'CONCAT(SUBSTRING(json, 1, CHAR_LENGTH(json) - 1),'.
                '\',{"message":"Propuesta Cancelada","date":"\', CURTIME(), \'","time":"\', CURTIME(), \'", "sender":\', applicant, \',"state":6,"deal":"\', trato, \'","dealState":8}]\');
            INSERT INTO deal_states (deal_id, state_id,created_at ,updated_at) VALUES (trato, 8,NOW(), NOW());
            UPDATE conversations SET message = json;
            END IF;

        END LOOP c1_loop;

        CLOSE cursor1;

        END');

        DB::unprepared("CREATE EVENT `dealForRating` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-02-28 00:00:00' ENDS '2025-05-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `changeDealForRating`(@p0, @p1)");

        DB::unprepared("CREATE EVENT `changeToFinishDeal` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-02-28 00:00:00' ENDS '2025-05-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `finishDeal`(@p0, @p1)");

        DB::unprepared("CREATE EVENT `changeToRefuseDeal` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-02-28 00:00:00' ENDS '2025-05-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL `refuseDeal`(@p0, @p1)");
        
        DB::unprepared("SET GLOBAL event_scheduler='ON'");

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

        DB::unprepared("DROP PROCEDURE IF EXISTS `changeDealForRating`");

        DB::unprepared("DROP EVENT IF EXISTS `changeToFinishDeal`");

        DB::unprepared("DROP PROCEDURE IF EXISTS `finishDeal`");

        DB::unprepared("DROP EVENT IF EXISTS `changeToRefuseDeal`");

        DB::unprepared("DROP PROCEDURE IF EXISTS `refuseDeal`");

    }
}

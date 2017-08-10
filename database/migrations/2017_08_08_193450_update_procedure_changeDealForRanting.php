<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProcedureChangeDealForRanting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `changeDealForRating`;");
        
        DB::unprepared("CREATE PROCEDURE `changeDealForRating`(OUT `trato` INT, OUT `estado` INT)
        BEGIN

        DECLARE cursor1 CURSOR FOR SELECT id FROM deals WHERE date <= curdate() AND time <= CURTIME() AND state_id = 7;

        OPEN cursor1;
        c1_loop: LOOP
            FETCH cursor1 INTO trato;
                UPDATE deals SET state_id = 12 WHERE id = trato;

        END LOOP c1_loop;

        CLOSE cursor1;

        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `changeDealForRating`");
    }
}

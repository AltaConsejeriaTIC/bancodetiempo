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

        DB::unprepared("CREATE EVENT `dealInProgress`
                        ON SCHEDULE EVERY 5 MINUTE
                        STARTS '2017-02-28 00:00:00.000000'
                        ENDS '2025-05-27 00:00:00.000000'
                        ON COMPLETION NOT PRESERVE ENABLE DO
                        SELECT * FROM deals
                        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deal_states');
    }
}

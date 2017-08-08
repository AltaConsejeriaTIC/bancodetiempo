<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStateTableDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->integer('state_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->string('cancelObservation')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('deals', function(Blueprint $table) {
            $table->dropColumn('state_id');
            $table->dropColumn('creator_id');
            $table->dropColumn('cancelObservation');
       });
    }
}

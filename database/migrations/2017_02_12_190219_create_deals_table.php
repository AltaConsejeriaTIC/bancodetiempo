*<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer("service_id")->unsigned();
            $table->date("date");
            $table->time("time");
            $table->string("location");
            $table->integer("value");
            $table->text("description")->nullable();
            $table->integer("conversations_id")->unsigned();
            $table->boolean("response_applicant")->nullable();
            $table->boolean("response_offerer")->nullable();
            $table->integer("applicant_badObservations_id")->unsigned()->default(1);
            $table->integer("offerer_badObservations_id")->unsigned()->default(1);
            $table->text("applicant_observation")->nullable();
            $table->text("offerer_observation")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}

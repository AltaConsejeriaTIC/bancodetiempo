<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Deal;

class UpdateDealStatesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $deals = Deal::where("state_id", 0)->get();
        foreach($deals as $deal){
            $state = $deal->dealStates->last()->state_id;
            $deal->update([
                "state_id" => $state
            ]);
        }
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

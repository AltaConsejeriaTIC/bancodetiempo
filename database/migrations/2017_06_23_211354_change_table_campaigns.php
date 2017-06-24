<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Campaigns;
use App\Models\Groups;

class ChangeTableCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cols = DB::getSchemaBuilder()->getColumnListing('campaigns');

        if(array_search('groups_id', $cols) !== false){
            $users = [];
            foreach(Campaigns::all() as $campaign){
                $group = Groups::find($campaign->groups_id);
                $users[$campaign->id] = $group->admin_id;
            }

            Schema::table('campaigns', function (Blueprint $table) {
                $table->dropForeign('campaigns_groups_id_foreign');
            });

            DB::unprepared("ALTER TABLE `campaigns` CHANGE COLUMN `groups_id` `user_id` INTEGER UNSIGNED NOT NULL;");


            Schema::table('campaigns', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade');
            });

            foreach($users as $campaign => $user){
                Campaigns::find($campaign)->update([
                    "user_id" => $user
                ]);
            }
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared("CREATE VIEW allData AS
                        SELECT
                        u.id as id,
                        u.first_name as firstname,
                        u.last_name as lastname,
                        u.email2 as email,
                        u.gender as gender,
                        u.birthDate as birthdate,
                        u.credits as credits,
                        u.ranking as ranking,
                        st.state as state,
                        i.id as interest_id,
                        ci.category as interest_name,
                        s.id as service_id,
                        s.name as service_name,
                        s.value as service_value,
                        ts.tag_id as service_tag_id,
                        t.tag as service_tag_name,
                        d.id as service_deal_id,
                        concat(ud.first_name, ' ', ud.last_name) as service_deal_participantName,
                        d.date as service_deal_date,
                        d.time as service_deal_time,
                        g.id as group_id,
                        g.name as group_name
                        FROM users AS u
                        INNER JOIN states AS st ON st.id = u.state_id
                        LEFT JOIN interest_users AS i ON i.user_id = u.id
                        LEFT JOIN categories as ci ON ci.id = i.category_id
                        LEFT JOIN services as s ON s.user_id = u.id
                        LEFT JOIN tags_services as ts ON ts.service_id = s.id
                        LEFT JOIN tags as t ON t.id = ts.tag_id
                        LEFT JOIN deals as d ON d.service_id = s.id
                        LEFT JOIN users as ud ON ud.id = d.user_id
                        LEFT JOIN groups as g ON g.admin_id = u.id");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW allData");

    }
}

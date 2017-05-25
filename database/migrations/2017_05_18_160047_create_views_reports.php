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

        DB::unprepared("CREATE VIEW report_users as
                        SELECT
                        u.id,
                        u.first_name,
                        u.last_name,
                        u.email2,
                        u.avatar,
                        u.gender,
                        u.aboutMe,
                        u.credits,
                        u.birthDate,
                        u.ranking,
                        s.state,
                        u.privacy_policy,
                        u.created_at,
                        u.updated_at
                        FROM users as u
                        INNER JOIN states as s ON s.id = u.state_id");

        DB::unprepared("CREATE VIEW report_insterest as
                        SELECT
                        i.user_id,
                        c.category
                        FROM interest_users as i
                        INNER JOIN categories as c ON c.id = i.category_id");

        DB::unprepared("CREATE VIEW report_service as
                        SELECT
                        s.name,
                        s.value,
                        s.virtually,
                        s.presently,
                        s.user_id,
                        s.created_at,
                        s.updated_at,
                        c.category,
                        st.state
                        FROM services as s
                        INNER JOIN categories AS c ON C.id = s.category_id
                        INNER JOIN states AS st ON st.id = s.state_id");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW report_users");

        DB::unprepared("DROP VIEW report_insterest");

        DB::unprepared("DROP VIEW report_service");

    }
}

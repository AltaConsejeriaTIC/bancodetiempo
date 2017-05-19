<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportUsersTable extends Migration
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
                        u.id as id,
                        u.first_name as userFirstName,
                        u.last_name as userLastName,
                        u.email2 as userEmail,
                        u.avatar as userAvatar,
                        u.gender as userGender,
                        u.aboutMe as userAbout,
                        u.credits as userCredits,
                        u.birthDate as userBirthDate,
                        u.ranking as userRanking,
                        s.state as userState,
                        u.privacy_policy,
                        u.created_at as userCreate,
                        u.updated_at as userUpdate,
                        se.name as serviceName,
                        se.value as serviceValue,
                        se.description as serviceDescription,
                        se.virtually as serviceVirtually,
                        se.presently as servicePresently,
                        se.image as serviceImage,
                        cat.category as serviceCategory,
                        sSe.state as serviceState,
                        se.created_at as serviceCreate,
                        se.updated_at as serviceUpdate,
                        se.ranking as serviceRanking
                        FROM users as u
                        INNER JOIN states as s ON s.id = u.state_id
                        LEFT JOIN services as se ON se.user_id = u.id
                        LEFT JOIN states as sSe ON sSe.id = se.state_id
                        LEFT JOIN categories AS cat ON cat.id = se.category_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW report_users");
    }
}

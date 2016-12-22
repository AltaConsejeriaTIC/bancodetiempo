<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlterAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Foreign key Table Roles
        Schema::table('users', function($table)
        {
          $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade');

          $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');      
        });

        // Foreign key Table network_accounts
        Schema::table('network_accounts', function($table)
        {
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });

        // Foreign key Table services
        Schema::table('services', function($table)
        {
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

          $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');      
        });

        // Foreign key Table interest_users
        Schema::table('interest_users', function($table)
        {
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

          $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade');      
        });

        // Foreign key Table categories_services
        Schema::table('categories_services', function($table)
        {
          $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade');

          $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade');      
        });

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

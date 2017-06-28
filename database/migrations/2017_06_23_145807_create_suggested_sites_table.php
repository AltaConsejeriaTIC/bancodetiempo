<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestedSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggested_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->text("address");
            $table->text("requirements");
            $table->text('contact');
            $table->text('description');
            $table->string("coordinates");
            $table->integer('category_site_id')->unsigned();
            $table->timestamps();
        });

         Schema::table('suggested_sites', function (Blueprint $table) {
            $table->foreign('category_site_id')
                ->references('id')
                ->on('categories_sites')
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
        Schema::dropIfExists('suggested_sites');
    }
}

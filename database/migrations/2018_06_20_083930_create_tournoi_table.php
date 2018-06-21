<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournoi', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('nb_participants');
            $table->integer('createur_id')->unsigned();
            $table->foreign('createur_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournoi', function(Blueprint $table) {
            $table->dropForeign('tournoi_createur_id_foreign');
        });
        Schema::dropIfExists('tournoi');
    }
}

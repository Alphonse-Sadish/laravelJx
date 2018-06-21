<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournoiParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournoi_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('tournoi_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->foreign('tournoi_id')->references('id')->on('tournoi');
            $table->foreign('participant_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournoi_participants', function(Blueprint $table) {
            $table->dropForeign('tournoi_participants_tournoi_id_foreign');
            $table->dropForeign('tournoi_participants_participant_id_foreign');
        });
        Schema::dropIfExists('tournoi_participants');
    }
}

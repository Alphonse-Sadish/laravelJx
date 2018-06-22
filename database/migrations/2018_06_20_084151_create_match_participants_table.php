<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('match_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('match');
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
        Schema::table('match_participants', function(Blueprint $table) {
            $table->dropForeign('match_participants_match_id_foreign');
            $table->dropForeign('match_participants_participant_id_foreign');
        });
        Schema::dropIfExists('match_participants');
    }
}

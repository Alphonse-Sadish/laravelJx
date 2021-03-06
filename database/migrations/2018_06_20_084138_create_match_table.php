<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('stade');
            $table->integer('tournoi_id')->unsigned();
            $table->foreign('tournoi_id')->references('id')->on('tournoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('match', function(Blueprint $table) {
            $table->dropForeign('match_tournoi_id_foreign');
        });
        Schema::dropIfExists('match');
    }
}

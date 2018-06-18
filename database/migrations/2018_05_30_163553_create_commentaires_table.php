<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenu');
            $table->integer('position');
            $table->integer('idJeux')->nullable()->unsigned();
            $table->integer('idUser')->nullable()->unsigned();

            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idJeux')->references('id')->on('jeux');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}

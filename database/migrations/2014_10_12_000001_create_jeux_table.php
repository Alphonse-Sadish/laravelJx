<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('idCategorie')->nullable()->unsigned();
            $table->integer('idPlateforme')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('idCategorie')->references('id')->on('categories');
            $table->foreign('idPlateforme')->references('id')->on('plateformes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
}

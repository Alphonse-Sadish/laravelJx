<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('adresse')->nullable();
            $table->integer('age')->nullable();
            $table->string('rue')->nullable();
            $table->string('appart')->nullable();
            $table->integer('idJeux')->nullable()->unsigned();
            $table->integer('idPlateforme')->nullable()->unsigned();
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->date('delete_at')->nullable();


            $table->foreign('idJeux')->references('id')->on('jeux');
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
        Schema::dropIfExists('users');
    }
}

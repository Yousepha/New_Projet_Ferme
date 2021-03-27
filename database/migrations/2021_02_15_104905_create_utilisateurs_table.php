<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('idUtilisateur');           
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->integer('telephone')->unique();
            $table->string('adresse',255);
            $table->string('photo',255)->nullable();
            $table->string('login')->unique();
            $table->string('password',255);
            $table->string('profile',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}

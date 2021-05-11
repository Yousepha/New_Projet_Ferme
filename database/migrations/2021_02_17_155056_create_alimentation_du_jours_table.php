<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentationDuJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentation_du_jours', function (Blueprint $table) {
            $table->bigIncrements('idAlimentation');
            $table->unsignedBigInteger('fermier_id');
            $table->foreign('fermier_id')->references('idUtilisateur')->on('fermiers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomAlimentation');
            $table->integer('quantite');
            $table->date('date');
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
        Schema::dropIfExists('alimentation_du_jours');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_laits', function (Blueprint $table) {
            $table->bigIncrements('idVenteLait');  
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('idCom')->on('commandes')->onUpdate('cascade')->onDelete('cascade'); 
            $table->unsignedBigInteger('bouteille_id')->nullable();
            $table->foreign('bouteille_id')->references('idBouteille')->on('bouteilles')->onUpdate('cascade')->onDelete('cascade');          
            $table->integer('prixTotale');
            $table->integer('nbrBouteilleVendu')->nullable();
            $table->string('enLigne')->default('pas en ligne');
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
        Schema::dropIfExists('vente_laits');
    }
}

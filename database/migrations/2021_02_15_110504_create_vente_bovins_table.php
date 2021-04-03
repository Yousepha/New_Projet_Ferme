<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_bovins', function (Blueprint $table) {
            $table->bigIncrements('idVenteBovin'); 
            $table->unsignedBigInteger('bovin_id')->unique();
            $table->foreign('bovin_id')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('idCom')->on('commandes')->onUpdate('cascade')->onDelete('cascade');          
            $table->integer('prixBovin');
            $table->string('enLigne')->default('pas en ligne');
            $table->dateTime('dateVenteBovin')->default(DB::raw('CURRENT_TIMESTAMP'))->unique();
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
        Schema::dropIfExists('vente_bovins');
    }
}

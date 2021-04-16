<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('idFacture'); 
            $table->integer('montant');
            $table->dateTime('datePaiement')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('moyenDePaiement')->nullable();
            $table->unsignedBigInteger('commande_id')->nullable();
            $table->foreign('commande_id')->references('idCom')->on('commandes')->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::dropIfExists('factures');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraiteDuJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traite_du_jours', function (Blueprint $table) {
            $table->bigIncrements('idTraiteDuJour'); 
            $table->date('dateTraite');
            $table->unsignedBigInteger('productionLait_id');
            $table->foreign('productionLait_id')->references('idProductionLait')->on('production_laits')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('fermier_id');
            $table->foreign('fermier_id')->references('user_id')->on('fermiers')->onUpdate('cascade')->onDelete('cascade');            
            $table->float('traiteMatin');
            $table->float('traiteSoir');
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
        Schema::dropIfExists('traite_du_jours');
    }
}

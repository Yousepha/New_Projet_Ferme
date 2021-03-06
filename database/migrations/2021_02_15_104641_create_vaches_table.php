<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaches', function (Blueprint $table) {
            $table->bigIncrements('idBovin')->unsigned(); 
            $table->foreign('idBovin')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsignedBigInteger('race_id')->nullable();
            // $table->foreign('race_id')->references('idRace')->on('races')->onUpdate('cascade')->onDelete('cascade'); 
            $table->string('codeBovin')->unique();
            $table->unsignedBigInteger('periode_id')->nullable();
            $table->foreign('periode_id')->references('idPeriode')->on('periodes')->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::dropIfExists('vaches');
    }
}

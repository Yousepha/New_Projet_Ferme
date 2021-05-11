<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovins', function (Blueprint $table) {
            $table->bigIncrements('idBovin')->unique(); 
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('idRace')->on('race_id')->onUpdate('cascade')->onDelete('cascade');          
            $table->string('codeBovin')->unique();
            $table->string('nom');
            $table->string('photo')->nullable();
            $table->string('etatDeSante');
            $table->string('situation')->default('pas en vente');
            $table->integer('prix')->nullable();
            $table->date('dateNaissance')->nullable();
            $table->string('geniteur')->nullable();
            $table->string('genitrice')->nullable();
            $table->text('description')->nullable();
            $table->string('etat')->default('Vivant');
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
        Schema::dropIfExists('bovins');
    }
}

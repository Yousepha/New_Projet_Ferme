<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesages', function (Blueprint $table) {
            $table->bigIncrements('idPesage');
            $table->date('datePesee'); 
            $table->unsignedBigInteger('bovin_id');
            $table->foreign('bovin_id')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');          
            $table->float('poids');
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
        Schema::dropIfExists('pesages');
    }
}

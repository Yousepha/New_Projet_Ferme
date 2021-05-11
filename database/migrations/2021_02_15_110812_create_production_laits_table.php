<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_laits', function (Blueprint $table) {
            $table->bigIncrements('idProductionLait');  
            $table->unsignedBigInteger('bovin_id');
            $table->foreign('bovin_id')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::dropIfExists('production_laits');
    }
}

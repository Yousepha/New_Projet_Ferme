<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->bigIncrements('idDiagnostic'); 
            $table->unsignedBigInteger('bovin_id');
            $table->foreign('bovin_id')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('maladie_id');
            $table->foreign('maladie_id')->references('idMaladie')->on('maladie')->onUpdate('cascade')->onDelete('cascade');
            $table->date('dateMaladie');
            $table->date('dateGuerison')->nullable(); 
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
        Schema::dropIfExists('diagnostics');
    }
}

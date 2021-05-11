<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutresDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autres_depenses', function (Blueprint $table) {
            $table->bigIncrements('idDepenses');   
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('idUtilisateur')->on('admins')->onUpdate('cascade')->onDelete('cascade');        
            $table->date('dateDepenses');
            $table->string('type');
            $table->text('libelle');
            $table->integer('montant');
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
        Schema::dropIfExists('autres_depenses');
    }
}

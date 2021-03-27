<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatAlimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_aliments', function (Blueprint $table) {
            $table->bigIncrements('idAchatAliment');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('user_id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomAliment');
            $table->integer('quantite');
            $table->integer('montant');
            $table->date('dateAchatAliment');
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
        Schema::dropIfExists('achat_aliments');
    }
}

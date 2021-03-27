->onUpdate('cascade')->onDelete('cascade')<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $timestamps =false;
    public function up()
    {
        Schema::create('achat_bovins', function (Blueprint $table) {
            $table->bigIncrements('idAchat');
            $table->unsignedBigInteger('bovin_id')->unique();
            $table->foreign('bovin_id')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('user_id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('montantBovin');
            $table->date('dateAchatBovin');
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
        Schema::dropIfExists('achat_bovins');
    }
}

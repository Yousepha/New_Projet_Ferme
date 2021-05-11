<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_laits', function (Blueprint $table) {
            $table->bigIncrements('idStock');
            $table->float('quantiteTotale')->nullable();
            $table->float('quantiteVendue')->nullable();
            $table->float('quantiteDispo')->nullable();
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
        Schema::dropIfExists('stock_laits');
    }
}

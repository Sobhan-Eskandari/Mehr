<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketMategoryTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_mategorty', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('market_id')->unsigned();
            $table->bigInteger('mategorty_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_mategory');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariff2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * primary key: id
         * name of the tariff: name
         * price of tariff: cost
         * description about tariff: desc
         */
        Schema::create('tariff2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cost');
            $table->text('desc');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff2s');
    }
}

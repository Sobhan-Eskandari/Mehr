<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('systemic_code')->nullable()->default(0);
            $table->bigInteger('user_id');
            $table->string('market_name')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->char('zip',10)->nullable();
            $table->char('market_tel', 11)->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('normal_percentage')->nullable()->unsigned();
            $table->char('special_percentage')->nullable();
            $table->string('special_percentage_start')->nullable()->default(null);
            $table->string('special_percentage_end')->nullable();
            $table->string('contract_start')->nullable();
            $table->string('contract_end')->nullable();
            $table->boolean('market_type')->nullable()->default(0);
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('point')->nullable();
            $table->text('pos')->nullable();
            $table->string('marketer')->nullable();
            $table->string('acquainted_by')->nullable(true);
            $table->longText('text')->nullable();
            $table->bigInteger('creator_id')->unsigned()->nullable();
            $table->bigInteger('editor_id')->unsigned()->nullable()->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
}

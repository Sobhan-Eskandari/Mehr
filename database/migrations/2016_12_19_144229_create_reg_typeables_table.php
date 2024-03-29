<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegTypeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_typeables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reg_type_id')->nullable();
            $table->bigInteger('reg_typeable_id')->nullable();
            $table->string('reg_typeable_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reg_typeables');
    }
}

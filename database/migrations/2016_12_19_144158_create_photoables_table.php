<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoablesTable extends Migration
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
         * foreign key: photo_id references id on photos table
         * foreign key: photoable_id references id on any table using this table depending on the relation
         * to determine the table in which this photo is used: photoable_type
         */
        Schema::create('photoables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('photo_id')->nullable();
            $table->bigInteger('photoable_id')->nullable();
            $table->string('photoable_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photoables');
    }
}

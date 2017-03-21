<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
         * the systemic code that was going to be stored in employer db: systemic_code
         * name: first_name and last_name
         * zip code: zip
         * home telephone number: home_tel
         * work telephone number: work_tel
         * emergency telephone number: emergency_tel
         * first cellphone number: cell_1
         * second cellphone number: cell_2
         * the person who absorbed this user: marketer
         * the person who told the user about Mehr card: acquainted_by
         * user explanation: text
         */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('systemic_code')->nullable()->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->char('social_security_number', 10)->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->char('zip', 10)->nullable();
            $table->char('home_tel', 11)->nullable();
            $table->char('work_tel', 11)->nullable();
            $table->char('emergency_tel', 11)->nullable();
            $table->char('cell_1', 11)->nullable();
            $table->char('cell_2', 11)->nullable();
            $table->string('email')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_card_number')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('zhenic_card_number')->nullable();
            $table->string('marketer')->nullable();
            $table->string('acquainted_by')->nullable();
            $table->longText('text')->nullable();
            $table->bigInteger('creator_id')->nullable();
            $table->bigInteger('editor_id')->nullable();
            $table->boolean('role')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('last_logged_in_at')->nullable();
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
        Schema::drop('users');
    }
}

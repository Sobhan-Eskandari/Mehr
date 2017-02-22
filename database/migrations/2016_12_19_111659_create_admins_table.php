<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('systemic_code')->nullable()->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->char('social_security_number', 10)->nullable()->unique();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->char('zip', 10)->nullable()->unique();
            $table->char('home_tel', 11)->nullable();
            $table->char('work_tel', 11)->nullable();
            $table->char('emergency_tel', 11)->nullable();
            $table->char('cell_1', 11)->nullable()->unique();
            $table->char('cell_2', 11)->nullable();
            $table->string('email')->unique();
            $table->bigInteger('creator_id')->nullable();
            $table->bigInteger('editor_id')->nullable();
            $table->boolean('create_user')->nullable()->default(0);
            $table->boolean('edit_user')->nullable()->default(0);
            $table->boolean('delete_user')->nullable()->default(0);
            $table->boolean('create_admin')->nullable()->default(0);
            $table->boolean('edit_admin')->nullable()->default(0);
            $table->boolean('delete_admin')->nullable()->default(0);
            $table->boolean('create_market')->nullable()->default(0);
            $table->boolean('edit_market')->nullable()->default(0);
            $table->boolean('delete_market')->nullable()->default(0);
            $table->boolean('create_news')->nullable()->default(0);
            $table->boolean('edit_news')->nullable()->default(0);
            $table->boolean('delete_news')->nullable()->default(0);
            $table->boolean('view_message')->nullable()->default(0);
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
        Schema::drop('admins');
    }
}

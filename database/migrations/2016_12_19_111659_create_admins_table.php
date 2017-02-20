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
            $table->string('systemic_code')->nullable(false)->default(0);
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->char('social_security_number', 10)->nullable(false)->unique();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('state')->nullable(false);
            $table->string('city')->nullable(false);
            $table->text('address')->nullable(false);
            $table->char('zip', 10)->nullable()->unique();
            $table->char('home_tel', 11)->nullable();
            $table->char('work_tel', 11)->nullable();
            $table->char('emergency_tel', 11)->nullable();
            $table->char('cell_1', 11)->nullable(false)->unique();
            $table->char('cell_2', 11)->nullable();
            $table->string('email')->unique();
            $table->bigInteger('creator_id')->nullable();
            $table->bigInteger('editor_id')->nullable();
            $table->boolean('create_user')->nullable(false)->default(0);
            $table->boolean('edit_user')->nullable(false)->default(0);
            $table->boolean('delete_user')->nullable(false)->default(0);
            $table->boolean('create_admin')->nullable(false)->default(0);
            $table->boolean('edit_admin')->nullable(false)->default(0);
            $table->boolean('delete_admin')->nullable(false)->default(0);
            $table->boolean('create_market')->nullable(false)->default(0);
            $table->boolean('edit_market')->nullable(false)->default(0);
            $table->boolean('delete_market')->nullable(false)->default(0);
            $table->boolean('create_news')->nullable(false)->default(0);
            $table->boolean('edit_news')->nullable(false)->default(0);
            $table->boolean('delete_news')->nullable(false)->default(0);
            $table->boolean('view_message')->nullable(false)->default(0);
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

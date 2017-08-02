<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('pseudo')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_token')->nullable();
            $table->string('remember_token')->nullable();
            $table->date('password_requested_at')->nullable();
            $table->date('last_login')->nullable();
            $table->date('date_naiss');
            $table->text('description')->nullable();
            $table->string('discipline');
            $table->string('tel')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('status')->nullable();
            $table->string('discr');
            $table->string('salt')->nullable();
            $table->boolean('enabled')->default(false);
            $table->integer('group_id')->unsigned();
            $table->integer('user_group_id')->unsigned();
            $table->integer('user_status_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('user_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_group_id')->references('id')->on('user_status')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('users');
    }
}

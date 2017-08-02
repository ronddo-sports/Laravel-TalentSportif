<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSportifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sportifs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable();
            $table->string('club_actuel',40)->nullable();
            $table->float('poid',6,3)->unsigned()->nullable();
            $table->float('taille',5,3)->unsigned()->nullable();
            $table->string('poste',40)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('user_manager_id')->unsigned()->nullable();
            $table->integer('user_group_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_manager_id')->references('id')->on('user_managers');
            $table->foreign('user_group_id')->references('id')->on('user_groups');
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
        Schema::drop('user_sportifs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vues', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('vues');
    }
}

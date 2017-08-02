<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_institutions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('president')->nullable();
            $table->integer('federation_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('federation_id')->references('id')->on('user_federations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('user_institutions');
    }
}

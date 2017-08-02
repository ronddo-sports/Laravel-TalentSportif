<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('type',["centre", "club", "association", "fondation"]);
            $table->string('institution')->nullable();
            $table->integer('user_institution_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('user_institution_id')->references('id')->on('user_institutions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('user_groups');
    }
}

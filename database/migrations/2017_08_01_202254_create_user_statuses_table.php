<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_statuses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('groupe',false,true);
            $table->string('type');
            $table->string('logo_url')->default('default_status.jpg');
            $table->boolean('enabled');
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
        Schema::drop('user_statuses');
    }
}

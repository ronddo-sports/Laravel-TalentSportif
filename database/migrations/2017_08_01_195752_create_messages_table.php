<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function(Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('exped_id')->unsigned();
            $table->integer('recep_id')->unsigned();
            $table->boolean('est_lu')->default(false);
            $table->foreign('exped_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('recep_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('messages');
    }
}

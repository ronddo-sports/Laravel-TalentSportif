<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function(Blueprint $table) {
            $table->increments('id');
            $table->string('discr');
            $table->string('type');
            $table->string('url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('source')->nullable();
            $table->string('vid_length')->nullable();
            $table->boolean('actif')->default(true);
            $table->integer('user_id')->unsigned();
            $table->integer('album_id')->unsigned()->default(0);
            $table->integer('post_id')->unsigned()->default(0);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('album_id')->references('id')->on('albums');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}

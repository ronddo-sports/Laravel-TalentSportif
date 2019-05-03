<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtag_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hashtag')->unsigned();
            $table->integer('id_post')->unsigned();
            $table->timestamp('date_exp')->nullable();
            $table->foreign('id_hashtag')->references('id')->on('hashtag');
            $table->foreign('id_post')->references('id')->on('post');
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
        Schema::dropIfExists('hashtag_posts');
    }
}

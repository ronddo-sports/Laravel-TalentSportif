<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class  CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *['name','name_canonical','del',
    'active','user_id','post_id']
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_canonical');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('parent_id')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('auto_generated')->default(false);

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
        Schema::drop('albums');
    }
}

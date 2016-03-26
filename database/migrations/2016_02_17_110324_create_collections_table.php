<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20);
            $table->tinyInteger('permissions');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //cuando se elimine un usario manten el post y su user_id a null.
            $table->timestamps();
        });

        Schema::create('collection_post', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('collection_id')->unsigned();
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('collection_post');
        Schema::drop('collections');
    }
}

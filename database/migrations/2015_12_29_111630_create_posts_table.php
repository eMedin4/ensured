<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('location', 200);
            $table->text('content');
            $table->float('lat', 8, 5);
            $table->float('lng', 8, 5);
            $table->string('url', 500)->nullable();
            $table->smallInteger('up');
            $table->smallInteger('score');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //cuando se elimine un usario manten el post y su user_id a null.
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
        Schema::drop('posts');
    }
}

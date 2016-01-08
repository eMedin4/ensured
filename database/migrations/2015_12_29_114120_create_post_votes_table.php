<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postvotes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //cuando se elimine un usuario manten el voto y pon su user_id en null
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            //cuando se elimine un post que se eliminen tambien los postvotes
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `postvotes` ADD `ip_address` VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `postvotes` DROP COLUMN `ip_address`');
        
        Schema::drop('postvotes');
    }
}

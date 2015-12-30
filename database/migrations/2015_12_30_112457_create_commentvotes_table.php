<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentvotes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            //cuando se elimine un usuario manten el voto y pon su user_id a null
            $table->integer('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            //cuando se elimine un comentario que se elimnen tambien sus commentvotes
            $table->boolean('direction');
        });

        DB::statement('ALTER TABLE `commentvotes` ADD `ip_address` VARBINARY(16)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `commentvotes` DROP COLUMN `ip_address`');
        
        Schema::drop('commentvotes');
    }
}

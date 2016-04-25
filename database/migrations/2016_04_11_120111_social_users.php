<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocialUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('social')->default(0);
            $table->string('password', 60)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('social');
            /* Make user_id un-nullable */
            DB::statement('UPDATE `users` SET `password` = 0 WHERE `password` IS NULL;');
            DB::statement('ALTER TABLE `users` MODIFY `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL;');
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$this->truncateTables([
    		'users',
    		'comments',
    		'commentvotes',
    		'dates',
    		'lists',
    		'list_post',
    		'posts',
    		'postvotes',
    		'post_tag',
    		'tags'
    		]);

        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostvoteTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(CommentvoteTableSeeder::class);
        $this->call(DateTableSeeder::class);
        $this->call(PostTagTableSeeder::class);

    }

    private function truncateTables(array $tables)
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    	foreach ($tables as $table) {
    		DB::table($table)->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

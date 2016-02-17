<?php

use Illuminate\Database\Seeder;


class PostTagTableSeeder extends Seeder
{


	public function run()
	{

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        for($i = 0; $i <= 100; $i++) {
    		DB::table('post_tag')->insert([
			'post_id' => rand(1,100),
			'tag_id' => rand(1,25)
        	]);
    	}

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}



}

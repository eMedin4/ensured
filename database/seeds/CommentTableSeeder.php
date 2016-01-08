<?php

use Ensured\Entities\Comment;



class CommentTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new Comment;
	}

	public function getDummyData($faker, array $customValues = array())
	{

		return [
			'content' => $faker->randomElement([$faker->text($maxNbChars = 300),$faker->sentence()]),
			'position' => 1,   		
			'up' => $faker->randomElement([$faker->numberBetween($min = 0, $max = 4), 0]),
			'down' => $faker->randomElement([$faker->numberBetween($min = 0, $max = 2), 0]),
			'user_id' => $this->getRandom('User')->id,	
			'post_id' => $this->getRandom('Post')->id  		
    	];
	}

    public function run()
    {
    	$this->createMultiple(5);
    }


}

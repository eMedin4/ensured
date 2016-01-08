<?php

use Ensured\Entities\Post;



class PostTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new Post;
	}

	public function getDummyData($faker, array $customValues = array())
	{

		return [
			'title' => $faker->sentence(),
			'location' => $faker->sentence(),//$faker->randomElement([sentence($nbWords = 2),sentence($nbWords = 3)]),
			'content' => $faker->realText(),    		
			'lat' => $faker->randomFloat($nbMaxDecimals = 5, $min = 41.31000, $max = 41.46000), //41.31000 - 41.46000    		
			'lng' => $faker->randomFloat($nbMaxDecimals = 5, $min = 2.05000, $max = 2.24000), //2.05000 - 2.24000    		
			'url' => $faker->randomElement(['','',$faker->url()]),    		
			'up' => $faker->numberBetween($min = 0, $max = 26),    		
			'score' => $faker->numberBetween($min = 0, $max = 1000),    		
			'user_id' => $this->getRandom('User')->id  		
    	];
	}

    public function run()
    {
    	$this->createMultiple(5);
    }


}

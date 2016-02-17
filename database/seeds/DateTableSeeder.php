<?php

use Ensured\Entities\Date;



class DateTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new Date;
	}

	public function getDummyData($faker, array $customValues = array())
	{

		return [  		
			'date' => $faker->dateTimeBetween($startDate = "now", $endDate = "60 days")->format('Y-m-d'),
			'post_id' => $this->getRandom('Post')->id
    	];
	}

    public function run()
    {
    	$this->createMultiple(200);
    }


}

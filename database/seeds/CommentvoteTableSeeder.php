<?php

use Ensured\Entities\Commentvote;



class CommentvoteTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new Commentvote;
	}

	public function getDummyData($faker, array $customValues = array())
	{

		return [  		
			'user_id' => $this->getRandom('User')->id,
			'comment_id' => $this->getRandom('Comment')->id,
			'direction' => $faker->randomElement([0,1]),
			'ip_address' => inet_pton($faker->ipv4)
    	];
	}

    public function run()
    {
    	$this->createMultiple(20);
    }


}

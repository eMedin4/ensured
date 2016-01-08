<?php

use Ensured\Entities\Postvote;



class PostvoteTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new Postvote;
	}

	public function getDummyData($faker, array $customValues = array())
	{

		return [  		
			'user_id' => $this->getRandom('User')->id,
			'post_id' => $this->getRandom('Post')->id,
			'ip_address' => inet_pton($faker->ipv4)
    	];
	}

    public function run()
    {
    	$this->createMultiple(20);
    }


}

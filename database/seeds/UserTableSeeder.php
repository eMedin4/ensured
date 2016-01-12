<?php

use Ensured\Entities\User;



class UserTableSeeder extends BaseSeeder
{
	public function getModel()
	{
		return new User;
	}

	public function getDummyData($faker, array $customValues = array())
	{
		return [
			'name' => 'hola',
			'email' => 'elme79@gmail.com',
			'password' => bcrypt('secret')    		
    	];
	}

    public function run()
    {

    	$this->createMultiple(1);
    }



}

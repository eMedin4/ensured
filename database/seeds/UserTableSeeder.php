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
			'name' => $faker->userName,
			'email' => $faker->unique()->email,
			'password' => bcrypt('secret')    		
    	];
	}

    public function run()
    {
    	$this->createAdmin();
    	$this->createMultiple(10);
    }

    private function createAdmin()
    {
    	$this->create([
    			'name' => 'eMedin4',
    			'email' => 'elannmedina@gmail.com',
    			'password' => bcrypt('admin')
    		]);
    }

}

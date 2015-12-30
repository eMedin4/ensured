<?php

use Illuminate\Database\Seeder;
use Ensured\Entities\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
    	$this->createAdmin();
    	$this->createUsers(50);
    }

    private function createAdmin()
    {
    	User::create([
    			'name' => 'eMedin4',
    			'email' => 'elannmedina@gmail.com',
    			'password' => bcrypt('admin')
    		]);
    }

    private function createUsers($total)
    {
    	$faker = Faker::create();

    	for($i = 0; $i <= $total; $i++) {
    		User::create([
    			'name' => $faker->userName,
    			'email' => $faker->email,
    			'password' => bcrypt('secret')
    		]);
    	}
    }
}

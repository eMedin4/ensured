<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseSeeder extends Seeder {

    protected static $pool = array();
	
	protected function createMultiple($total, array $customValues = array())
    {

    	for($i = 0; $i <= $total; $i++) {
    		$this->create($customValues);
    	}

    }

    //metodo abstracto puesto que podemos tener diferentes 
    //tipos de modelos, es decir cambia en cada caso
    abstract public function getModel();
    abstract public function getDummyData($faker, array $customValues = array());


    protected function create(array $customValues = array())
    {

    	$faker = Faker::create();

		/*User::create([
			'name' => $faker->userName,
			'email' => $faker->email,
			'password' => bcrypt('secret')
		]); Esto es igual a (extrayendo a métodos genéricos:)*/
		$values = $this->getDummyData($faker, $customValues);
		$values = array_merge($values, $customValues);//si existe customvalues sobreescribe values
		return $this->addToPool($this->getModel()->create($values));

    }

    protected function getRandom($model)
    {

        if( ! isset (static::$pool[$model]))
        {
            throw new Exception("The $model collection does not exist");
        }

        return static::$pool[$model]->random();
    }

    private function addToPool($entity)
    {
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();

        if ( ! isset (static::$pool[$class]))
        {
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }

    
}
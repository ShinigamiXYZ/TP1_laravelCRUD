<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\fr_CA\Address as FrCaAddress;


class TownFactory extends Factory
{
    
    public function definition()
    {
        $faker = FakerFactory::create('fr_CA');
        $faker->addProvider(new FrCaAddress($faker));

        return [
            'name' => $faker->city
        ];
    }
}

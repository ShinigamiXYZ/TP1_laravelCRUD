<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\fr_CA\Address;

/*
Utilisation de la librairies et documentations -> https://github.com/fzaninotto/Faker#fakerprovideren_usperson 
 */

class TownFactory extends Factory
{
    
    public function definition()
    {
          // Créer une instance de Faker pour générer des noms de villes en français canadien(QC)
        $faker = FakerFactory::create('fr_CA');
        $faker->addProvider(new Address($faker));

        return [
            'name' => $faker->city
        ];
    }
}

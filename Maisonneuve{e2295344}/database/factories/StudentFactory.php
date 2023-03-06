<?php

namespace Database\Factories;
use App\Models\Student;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\fr_CA\Address;
use Faker\Provider\en_CA\PhoneNumber;
use Faker\Provider\fr_CA\Person;

/*
Utilisation de la librairies et documentations -> https://github.com/fzaninotto/Faker#fakerprovideren_usperson 
 */

class StudentFactory extends Factory
{
    
    public function definition()
    {
         // Créer une instance de Faker pour générer des noms de personnes en français canadien
        $fakeName = FakerFactory::create('fr_CA');
        $fakeName->addProvider(new Person($fakeName));
        $name = $fakeName->name;/* Tour de passe passe pour avoir des courriels representatifs */

        
       /*  Créer une instance de Faker pour générer des adresses en français canadien */
        $fakerAddress = FakerFactory::create('fr_CA');
        $fakerAddress->addProvider(new Address($fakerAddress));
         // Créer une instance de Faker pour générer des numéros de téléphone en anglais canadien
        $fakePhone = FakerFactory::create('en_CA'); // N'accepte pas français pour phone
        $fakePhone->addProvider(new PhoneNumber($fakePhone));
        

        return [
            'name' =>  $name ,
            'address' => $fakerAddress->address,
            'phone' => $fakePhone->phoneNumber,
            'email' => strtolower(str_replace(' ', '', $name)).'@gmail.com',  /* Tour de passe passe pour avoir des courriels representatifs */
            /* Idealement ajouter regex pour enlever tout types d'accents */
            'year_of_birth' => $fakeName->numberBetween(1950, 2022),   
            'town_id' => Town::inRandomOrder()->first()->id,

        ];
    }
}

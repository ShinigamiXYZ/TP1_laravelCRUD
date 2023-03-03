# TP1_laravelCRUD


### commands 

1. #### En utilisant les lignes de commande, créer un nouveau projet Laravel nommée Maisonneuve{votre matricule} (1 pt)
```
  - composer create-project --prefer-dist laravel/laravel Maisonneuve{e2295344}
  - <!-- adding bootstrap -->composer require twbs/bootstrap
```

1. #### En utilisant les lignes de commande, créer les modèles (2 pts)
```
php artisan make:model Student
php artisan make:model Town


```


2.  #### En utilisant les lignes de commande, créer les tables (2 pts)


```
php artisan make:migration create_town_table --create=towns
php artisan make:migration create_student_table --create=students

```
Ensuite dans database/migrations -> ajout et définitions des columns

Towns
```
  public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
```
Students
```
$table->id();
    $table->string('name');
    $table->string('address');
    $table->string('phone');
    $table->string('email');
    $table->year('year_of_birth');
    $table->unsignedBigInteger('town_id');
    $table->foreign('town_id')->references('id')->on('towns');
    $table->timestamps();
```

Conclue le tout avec la commande 
```
php artisan migrate
```

3. #### En utilisant les lignes de commande, saisir 15 nouvelles villes (1 pts)

Premièrement, créations de database/factories/TownFactory.php
```
php artisan make:factory TownFactory --model=Town
```

Ensuite a l'intérieur de database/factories/TownFactory.php utilsations de Faker
Basé sur -> https://github.com/fzaninotto/Faker#language-specific-formatters
```
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

```
Finalement a partir du tinker shell de laravel on creer 15 nouvelles villes

```
php artisan tinker
\App\Models\Town::factory()->count(15)->create();


```
4. #### En utilisant les lignes de commande, saisir 100 nouveaux étudient (1 pts)
  Premièrement, créations de database/factories/TownFactory.php
```
php artisan make:factory StudentFactory --model=App\Models\Student
``` 
Ensuite a l'intérieur de database/factories/StudentFactory.php utilsations de Faker
Basé sur -> https://github.com/fzaninotto/Faker#language-specific-formatters
```
namespace Database\Factories;
use App\Models\Student;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\fr_CA\Address;
use Faker\Provider\en_CA\PhoneNumber;
use Faker\Provider\fr_CA\Person;


class StudentFactory extends Factory
{
    
    public function definition()
    {
        $fakeName = FakerFactory::create('fr_CA');
        $fakeName->addProvider(new Person($fakeName));
        $name = $fakeName->name;/* Tour de passe passe pour avoir des courriels representatifs */

        $fakerAddress = FakerFactory::create('fr_CA');
        $fakerAddress->addProvider(new Address($fakerAddress));
        
        $fakePhone = FakerFactory::create('en_CA'); // N'accepte pas fr pour phone
        $fakePhone->addProvider(new PhoneNumber($fakePhone));
        

        return [
            'name' =>  $name ,
            'address' => $fakerAddress->address,
            'phone' => $fakePhone->phoneNumber,
            'email' => strtolower(str_replace(' ', '', $name)).'@gmail.com',  /* Tour de passe passe pour avoir des courriels representatifs */
            'year_of_birth' => $fakeName->numberBetween(1950, 2022),
            'town_id' => Town::inRandomOrder()->first()->id,

        ];
    }
}


```
Finalement a partir du tinker shell de laravel on creer 100 nouveau étudiant

```
php artisan tinker
\App\Models\Student::factory()->count(100)->create();

```
Pour les questions 4 et 5, effectuez une recherche des propriétés de "Factory" pour remplir des valeurs telles que des noms, des adresses, des téléphones, etc. (pas de phrases ou de texte aléatoires).

1. #### En utilisant les lignes de commande, créer les contrôleurs (2 pts)

```
php artisan make:controller StudentController
php artisan make:controller TownController
```
1.  #### Créez votre layout.blade avec vous CSS, vous devez importer bootstrap (ou du CSS personnalise) et le concevoir selon vos préférences. (2 pts)
   
Creation du master.blade.php qui servira de layout statique pour mes vues.
Ajout rapide via CDN

```
CSS
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >

 JS
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

```

Ensuite creation du master.blade.php qui servira de layout statique pour mes vues.

1.  #### Travailler avec bootstrap (ou du CSS personnalise) pour respecter les concepts d'ergonomie, soyez créatif (2pts).
2.  #### Créer un contrôleur “index” et une vue, pour afficher tous les étudiants, avec un lien pour sélectionner l'étudiant et le mettre à jour. (2 pts)

3. ####   Créer un contrôleur “create” et une vue, pour saisir un nouvel étudiant. Le formulaire doit avoir un champ “select” avec toutes les villes qui viennent de la base de données. (2 pts)
4. ####  Créer un contrôleur “show” et une vue, pour afficher un étudiant sélectionné. (2 pts)
5. ####  Créer un contrôleur “edit” et une vue, pour afficher un étudiant sélectionné dans un formulaire et le mettre à jour. (2 pts)
6. ####  Créer un contrôleur “destroy” pour supprimer un étudiant sélectionné. (1 pt)
7. ####  Publier votre projet dans GitHub (publique) et envoyer le lien dans la documentation. (2 pts)
8.  #### #### Enregistrez le projet avec une extension ZIP et ajouter la documentation dans la racine (1pt)
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partenaire;
use Faker\Generator as Faker;

$factory->define(Partenaire::class, function (Faker $faker) {
    return [
        'nom'=>$faker->company,
        'prenom_respo'=>$faker->firstName,
        'nom_respo'=>$faker->lastName,
        'numtel_respo'=>$faker->phoneNumber,

        'forme_juridique_id'=>$faker->numberBetween(1,5),
        'user_id'=>factory(App\User::class)->create()->id,

    ];
});

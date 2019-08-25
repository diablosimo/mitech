<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Adherent;
use Faker\Generator as Faker;

$factory->define(Adherent::class, function (Faker $faker) {
    return [
        'nom'=>$faker->lastName,
        'prenom'=>$faker->firstName,
        'description'=>$faker->text(200),
        'num_tel'=>$faker->phoneNumber,
        'user_id'=>factory(App\User::class)->create()->id,
    ];
});

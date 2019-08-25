<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'nom'=>getenv('SEEDER_ADMIN_NOM'),
        'prenom'=>getenv('SEEDER_ADMIN_PRENOM'),
        'user_id'=>factory(App\User::class)->create()->id,
    ];
});

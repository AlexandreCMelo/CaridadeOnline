<?php

use Charis\User;
use Faker\Generator as Faker;
use Faker\Provider\pt_BR\Address as BrazilAddress;
use Faker\Provider\pt_BR\Person as BrazilPerson;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;

    $faker->addProvider(new BrazilAddress($faker));
    $faker->addProvider(new BrazilPerson($faker));
    return [
        User::NAME => $faker->name,
        User::EMAIL => $faker->unique()->email,
        User::PASSWORD => $password ?: $password = bcrypt('secret'),
        User::ID_COUNTRY => 30,
        User::ID_LOCALE => 'br',
        User::ID_TIMEZONE => 178,
        User::REMEMBER_TOKEN => str_random(10),
    ];
});

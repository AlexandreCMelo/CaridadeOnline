<?php

use Faker\Generator as Faker;
use Faker\Provider\pt_BR\Address as BrazilAddress;
use Charis\Address;


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

$factory->define(Address::class, function (Faker $faker) {
    static $password;

    $faker->addProvider(new BrazilAddress($faker));

    $addressTypeHome = 10;
    $addressTypeBuilding = 20;

    return [
        Address::ID_TYPE => rand(0, 1) ? $addressTypeHome : $addressTypeBuilding,
        Address::OWNER_TYPE => 'Charis\User',
        Address::ID_OWNER => $faker->unique()->numberBetween(1, Charis\User::count()),
        Address::ID_COUNTRY => 30,
        Address::DISTRICT => null,
        Address::STATE => $faker->state(),
        Address::CITY => $faker->city(),
        Address::ADDRESS => $faker->streetAddress,
        Address::ZIP_CODE => $faker->postcode,
    ];
});
<?php

use Faker\Generator as Faker;
use Faker\Provider\pt_BR\Person as BrazilPerson;
use Charis\Document;


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

$factory->define(Document::class, function (Faker $faker) {
    static $password;

    $faker->addProvider(new BrazilPerson($faker));

    $documentTypeRg = 10;
    $documentTypeCpf = 20;

    if (rand(0, 1)) {
        $documentType = $documentTypeRg;
        $documentValue = $faker->rg();
    } else {
        $documentType = $documentTypeCpf;
        $documentValue = $faker->cpf();
    }

    return [
        Document::ID_TYPE => $documentType,
        Document::OWNER_TYPE => 'Charis\User',
        Document::ID_OWNER => $faker->numberBetween(1, Charis\User::count()),
        Document::VALUE => $documentValue,
    ];
});
<?php

use Charis\Entity;
use Charis\EntityActivity;
use Faker\Generator as Faker;
use Faker\Provider\pt_BR\Company as BrazilCompany;

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

$entityId = $factory->define(Entity::class, function (Faker $faker) {

    $faker->addProvider(new BrazilCompany($faker));

    return [
        Entity::NAME        => $faker->company,
        Entity::EMAIL       => $faker->unique()->email,
        Entity::ID_COUNTRY  => 30,
        Entity::ID_LOCALE   => 'br',
        Entity::ID_TIMEZONE => 'America/Sao_Paulo',
        Entity::WEBSITE     => 'www.dfa.com.br',
        Entity::DESCRIPTION => 'Sim claro',
    ];
});


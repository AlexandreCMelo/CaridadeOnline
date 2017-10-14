<?php

use Charis\Models\Organization;
use Charis\Models\ActivityOrganization;
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

$entityId = $factory->define(Organization::class, function (Faker $faker) {

    $faker->addProvider(new BrazilCompany($faker));

    return [
        Organization::NAME        => $faker->company,
        Organization::EMAIL       => $faker->unique()->email,
        Organization::ID_COUNTRY  => 30,
        Organization::ID_LOCALE   => 'br',
        Organization::ID_TIMEZONE => 178,
        Organization::WEBSITE     => 'www.dfa.com.br',
        Organization::DESCRIPTION => 'Sim claro',
    ];
});


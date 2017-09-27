<?php

use Faker\Generator as Faker;
use Charis\Models\Organization;
use Charis\Models\OrganizationTarget;
use Charis\Models\Target;

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

$factory->define(OrganizationTarget::class, function (Faker $faker) {
    $entitys = Charis\Models\Organization::pluck(Organization::ID)->toArray();
    $targets = Charis\Models\Target::pluck(Target::ID)->toArray();

    return [
        OrganizationTarget::ID_ORGANIZATION => $faker->randomElement($entitys),
        OrganizationTarget::ID_TARGET => $faker->randomElement($targets)
    ];
});

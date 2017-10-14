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
    $organization = Charis\Models\Organization::inRandomOrder()->first();
    $target = Charis\Models\Target::inRandomOrder()->first();
    $organization->targets()->attach($target->{Charis\Models\Target::ID});
    return [];
});

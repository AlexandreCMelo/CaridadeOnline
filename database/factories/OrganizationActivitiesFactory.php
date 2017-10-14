<?php

use Faker\Generator as Faker;
use Charis\Models\Organization;
use Charis\Models\ActivityOrganization;
use Charis\Models\Activity;

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

$factory->define(ActivityOrganization::class, function (Faker $faker) {
    $activity = Charis\Models\Activity::inRandomOrder()->first();
    $organization = Charis\Models\Organization::inRandomOrder()->first();
    $organization->activities()->attach($activity->{Charis\Models\Activity::ID});
    return [];
});

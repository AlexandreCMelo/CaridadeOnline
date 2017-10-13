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
    $organizations = Charis\Models\Organization::pluck(Organization::ID)->toArray();
    $activities = Charis\Models\Activity::pluck(Activity::ID)->toArray();

    return [
        ActivityOrganization::ID_ORGANIZATION => $faker->randomElement($organizations),
        ActivityOrganization::ID_ACTIVITY => $faker->randomElement($activities)
    ];
});

<?php

use Faker\Generator as Faker;
use Charis\Models\Organization;
use Charis\Models\OrganizationActivity;
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

$factory->define(OrganizationActivity::class, function (Faker $faker) {
    $organizations = Charis\Models\Organization::pluck(Organization::ID)->toArray();
    $activities = Charis\Models\Activity::pluck(Activity::ID)->toArray();

    return [
        OrganizationActivity::ID_ORGANIZATION => $faker->randomElement($organizations),
        OrganizationActivity::ID_ACTIVITY => $faker->randomElement($activities)
    ];
});

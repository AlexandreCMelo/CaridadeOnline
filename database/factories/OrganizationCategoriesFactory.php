<?php

use Faker\Generator as Faker;
use Charis\Organization;
use Charis\OrganizationCategory;
use Charis\Category;

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

$factory->define(OrganizationCategory::class, function (Faker $faker) {
    $organizations = Organization::pluck(Organization::ID)->toArray();
    $categories = Category::pluck(OrganizationCategory::ID)->toArray();

    return [
        OrganizationCategory::ID_ORGANIZATION => $faker->randomElement($organizations),
        OrganizationCategory::ID_CATEGORY => $faker->randomElement($categories)
    ];
});

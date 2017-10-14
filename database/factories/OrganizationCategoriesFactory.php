<?php

use Faker\Generator as Faker;
use Charis\Models\Organization;
use Charis\Models\CategoryOrganization;
use Charis\Models\Category;

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

$factory->define(CategoryOrganization::class, function (Faker $faker) {
    $organization = Organization::inRandomOrder()->first();
    $categories = Category::inRandomOrder()->first();
    $organization->categories()->attach($categories->{Charis\Models\Category::ID});
    return [];
});

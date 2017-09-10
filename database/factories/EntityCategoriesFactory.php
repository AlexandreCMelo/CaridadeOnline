<?php

use Faker\Generator as Faker;
use Charis\Entity;
use Charis\EntityCategory;
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

$factory->define(EntityCategory::class, function (Faker $faker) {
    $entitys = Entity::pluck(Entity::ID)->toArray();
    $categories = Category::pluck(EntityCategory::ID)->toArray();

    return [
        EntityCategory::ID_ENTITY => $faker->randomElement($entitys),
        EntityCategory::ID_CATEGORY => $faker->randomElement($categories)
    ];
});

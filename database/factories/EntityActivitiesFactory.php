<?php

use Faker\Generator as Faker;
use Charis\Entity;
use Charis\EntityActivity;
use Charis\Activity;

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

$factory->define(EntityActivity::class, function (Faker $faker) {
    $entitys = Charis\Entity::pluck(Entity::ID)->toArray();
    $activities = Charis\Activity::pluck(Activity::ID)->toArray();

    return [
        EntityActivity::ID_ENTITY => $faker->randomElement($entitys),
        EntityActivity::ID_ACTIVITY => $faker->randomElement($activities)
    ];
});

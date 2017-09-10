<?php

use Faker\Generator as Faker;
use Charis\Entity;
use Charis\EntityTarget;
use Charis\Target;

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

$factory->define(EntityTarget::class, function (Faker $faker) {
    $entitys = Charis\Entity::pluck(Entity::ID)->toArray();
    $targets = Charis\Target::pluck(Target::ID)->toArray();

    return [
        EntityTarget::ID_ENTITY => $faker->randomElement($entitys),
        EntityTarget::ID_TARGET => $faker->randomElement($targets)
    ];
});

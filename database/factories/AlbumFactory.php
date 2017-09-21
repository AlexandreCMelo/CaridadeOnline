<?php

use Faker\Generator as Faker;
use Charis\Album;
use Charis\Entity;
use Charis\User;

$factory->define(Model::class, function (Faker $faker) {

    $entitys = Charis\Entity::pluck(Entity::ID)->toArray();
    $users = Charis\User::pluck(User::ID)->toArray();
    $albumName = 'Album do '.$faker->name;

    return [
        Album::NAME => $albumName,
        Album::ID_ENTITY => $faker->randomElement($entitys),
        Album::CREATED_BY => $faker->randomElement($users),
    ];
});

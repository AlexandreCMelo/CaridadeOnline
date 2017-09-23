<?php

use Faker\Generator as Faker;
use Charis\Album;
use Charis\Organization;
use Charis\User;

$factory->define(Model::class, function (Faker $faker) {

    $organizations = Charis\Organization::pluck(Organization::ID)->toArray();
    $users = Charis\User::pluck(User::ID)->toArray();
    $albumName = 'Album do '.$faker->name;

    return [
        Album::NAME => $albumName,
        Album::ID_ORGANIZATION => $faker->randomElement($organizations),
        Album::CREATED_BY => $faker->randomElement($users),
    ];
});

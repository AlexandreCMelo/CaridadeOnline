<?php

use Faker\Generator as Faker;
use Charis\Models\Album;
use Charis\Models\Organization;
use Charis\Models\User;

$factory->define(Model::class, function (Faker $faker) {

    $organizations = Charis\Models\Organization::pluck(Organization::ID)->toArray();
    $users = Charis\Models\User::pluck(User::ID)->toArray();
    $albumName = 'Album do '.$faker->name;

    return [
        Album::NAME => $albumName,
        Album::ID_ORGANIZATION => $faker->randomElement($organizations),
        Album::CREATED_BY => $faker->randomElement($users),
    ];
});

<?php

use Faker\Generator as Faker;
use Charis\Models\Organization;
use Charis\Models\User;
use Charis\Models\Comment;
use Charis\Models\CommentType;

$factory->define(Comment::class, function (Faker $faker) {

    $organizations = Organization::pluck(Organization::ID)->toArray();
    $users = User::pluck(User::ID)->toArray();

    return [
        Comment::ID_ORGANIZATION => $faker->randomElement($organizations),
        Comment::ID_USER => $faker->randomElement($users),
        Comment::ID_TYPE => CommentType::ORGANIZATION,
        Comment::CONTENT => $faker->text(600),
    ];
});

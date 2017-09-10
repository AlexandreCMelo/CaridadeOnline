<?php

use Faker\Generator as Faker;
use Charis\EntityRoleUser;
use Charis\Entity;
use Charis\User;
use Charis\Role;


$factory->define(EntityRoleUser::class, function (Faker $faker) {
    $entitys = Entity::pluck(Entity::ID)->toArray();
    $users = User::pluck(User::ID)->toArray();
    $roles = Role::pluck(Role::ID)->toArray();

    if($roles == Role::ID_ADMIN){
        $roles = Role::pluck(Role::ID)->toArray();
    }

    return [
        EntityRoleUser::ID_ENTITY => $faker->randomElement($entitys),
        EntityRoleUser::ID_USER => $faker->randomElement($users),
        EntityRoleUser::ID_ROLE => $faker->randomElement($roles)
    ];
});


<?php

use Faker\Generator as Faker;
use Charis\Models\OrganizationRoleUser;
use Charis\Models\Organization;
use Charis\Models\User;
use Charis\Models\OrganizationRole;


$factory->define(OrganizationRoleUser::class, function (Faker $faker) {
    $organization = Organization::inRandomOrder()->first();
    $organizationRole = OrganizationRole::inRandomOrder()->first();
    $user = User::inRandomOrder()->first();
    $organization->users()->attach($user->{User::ID}, [OrganizationRoleUser::ID_ROLE => $organizationRole->{OrganizationRole::ID}]);
    return [];
});


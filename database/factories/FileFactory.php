<?php

use Faker\Generator as Faker;
use Charis\File;
use Charis\Entity;
use Charis\User;
use Charis\FileType;

$factory->define(Model::class, function (Faker $faker) {


    $faker->addProvider(New\Faker\Provider\File($faker));

    $arrayOwners = ['Charis\User','Charis\Entity'];
    $entitys = Charis\Entity::pluck(Entity::ID)->toArray();
    $users = Charis\User::pluck(User::ID)->toArray();
    $types = Charis\Target::pluck(FileType::ID)->toArray();

    $idsRel = $entitys;
    if(mt_rand(0,1)){
        $idsRel = $users;
    }

    return [
        File::ID_FILE_OWNER => $faker->randomElement($idsRel),
        File::ID_FILE_TYPE => $faker->randomElement($types),
        File::ID_FILE_TYPE => array_rand($arrayOwners, 1),
        File::NAME => $faker->file(),
        File::PATH => 'faker/'.$faker->file(),
        File::MIME_TYPE => $faker->mime(),
    ];

});

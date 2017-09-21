<?php

use Faker\Generator as Faker;
use Charis\Album;
use Charis\File;
use Charis\AlbumFile;

$factory->define(AlbumFile::class, function (Faker $faker) {

    $album = Charis\Album::pluck(Album::ID)->toArray();
    $file = Charis\File::pluck(File::ID)->toArray();

    return [
        AlbumFile::ID_ALBUM =>  $faker->randomElement($album),
        AlbumFile::ID_FILE => $faker->randomElement($file),
    ];
});

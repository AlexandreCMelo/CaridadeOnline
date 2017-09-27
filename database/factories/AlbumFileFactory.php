<?php

use Faker\Generator as Faker;
use Charis\Models\Album;
use Charis\Models\File;
use Charis\Models\AlbumFile;

$factory->define(AlbumFile::class, function (Faker $faker) {

    $album = Charis\Models\Album::pluck(Album::ID)->toArray();
    $file = Charis\Models\File::pluck(File::ID)->toArray();

    return [
        AlbumFile::ID_ALBUM =>  $faker->randomElement($album),
        AlbumFile::ID_FILE => $faker->randomElement($file),
    ];
});

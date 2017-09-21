<?php

use Illuminate\Database\Seeder;
use Charis\AlbumFile;

class AlbumFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlbumFile::truncate();
        factory(AlbumFile::class, 100)->create();
    }
}

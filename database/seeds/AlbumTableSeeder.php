<?php

use Illuminate\Database\Seeder;
use Charis\Models\Album;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::truncate();
        factory(Album::class, 10)->create();
    }
}

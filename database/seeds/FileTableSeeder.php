<?php

use Illuminate\Database\Seeder;
use Charis\File;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::truncate();
        factory(File::class, 100)->create();
    }
}

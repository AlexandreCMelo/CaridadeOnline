<?php

use Illuminate\Database\Seeder;
use Charis\EntityTarget;

class EntityTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityTarget::truncate();
        factory(EntityTarget::class, 100)->create();
    }
}

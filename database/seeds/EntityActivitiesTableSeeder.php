<?php

use Illuminate\Database\Seeder;
use Charis\EntityActivity;

class EntityActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityActivity::truncate();
        factory(EntityActivity::class, 100)->create();
    }
}

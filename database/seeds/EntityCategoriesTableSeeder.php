<?php

use Illuminate\Database\Seeder;
use Charis\EntityCategory;

class EntityCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityCategory::truncate();
        factory(EntityCategory::class, 100)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Charis\Models\OrganizationCategory;

class OrganizationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizationCategory::truncate();
        factory(OrganizationCategory::class, 100)->create();
    }
}

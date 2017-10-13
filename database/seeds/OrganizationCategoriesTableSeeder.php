<?php

use Illuminate\Database\Seeder;
use Charis\Models\CategoryOrganization;

class OrganizationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryOrganization::truncate();
        factory(CategoryOrganization::class, 100)->create();
    }
}

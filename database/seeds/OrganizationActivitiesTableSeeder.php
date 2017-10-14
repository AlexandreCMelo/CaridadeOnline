<?php

use Illuminate\Database\Seeder;
use Charis\Models\ActivityOrganization;

class OrganizationActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityOrganization::truncate();
        factory(ActivityOrganization::class, 100)->make();
    }
}

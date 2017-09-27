<?php

use Illuminate\Database\Seeder;
use Charis\Models\OrganizationActivity;

class OrganizationActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizationActivity::truncate();
        factory(OrganizationActivity::class, 100)->create();
    }
}

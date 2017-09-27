<?php

use Illuminate\Database\Seeder;
use Charis\Models\Organization;
use Charis\Models\OrganizationTarget;
use Charis\Models\OrganizationActivity;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Organization::TABLE_NAME)->delete();
        factory(Organization::class, 100)->create();
    }
}

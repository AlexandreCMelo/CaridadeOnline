<?php

use Illuminate\Database\Seeder;
use Charis\Organization;
use Charis\OrganizationTarget;
use Charis\OrganizationActivity;

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

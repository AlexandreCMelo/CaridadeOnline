<?php

use Illuminate\Database\Seeder;
use Charis\OrganizationRoleUser;

class OrganizationRoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizationRoleUser::truncate();
        factory(OrganizationRoleUser::class, 100)->create();
    }
}

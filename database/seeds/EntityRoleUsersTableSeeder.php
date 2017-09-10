<?php

use Illuminate\Database\Seeder;
use Charis\EntityRoleUser;

class EntityRoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntityRoleUser::truncate();
        factory(EntityRoleUser::class, 100)->create();
    }
}

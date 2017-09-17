<?php

use Illuminate\Database\Seeder;
use Charis\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(User::TABLE_NAME)->delete();
        factory(User::class, 100)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Charis\Entity;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Entity::TABLE_NAME)->delete();
        factory(Entity::class, 100)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(EntityActivitiesTableSeeder::class);
        $this->call(EntityCategoriesTableSeeder::class);
        $this->call(EntityTargetsTableSeeder::class);
        $this->call(EntityRoleUsersTableSeeder::class);
        $this->call(VoyagerDatabaseSeeder::class);

    }
}

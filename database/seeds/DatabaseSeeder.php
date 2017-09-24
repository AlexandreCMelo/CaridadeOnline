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
        $this->call(OrganizationTableSeeder::class);
        $this->call(OrganizationActivitiesTableSeeder::class);
        $this->call(OrganizationCategoriesTableSeeder::class);
        $this->call(OrganizationTargetsTableSeeder::class);
        $this->call(OrganizationRoleUsersTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(AlbumFileTableSeeder::class);

    }
}

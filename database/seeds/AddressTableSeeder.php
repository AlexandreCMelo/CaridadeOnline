<?php

use Illuminate\Database\Seeder;
use Charis\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::truncate();
        factory(Address::class, 200)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Charis\Models\Document;


class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::truncate();
        factory(Document::class, 100)->create();
    }
}

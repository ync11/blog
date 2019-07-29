<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        Tag::truncate();

        factory(Tag::class, 5)->create();
    }
}
<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tag::create([
            'name' => 'shoe'
        ]);
        Tag::create([
            'name' => 'investment'
        ]);
        Tag::create([
            'name' => 'scandal'
        ]);
    }
}

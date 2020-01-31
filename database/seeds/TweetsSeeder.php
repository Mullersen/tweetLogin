<?php

use Illuminate\Database\Seeder;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert([
            'author' => Str::random(50),
            'content' => Str::random(50)
        ]);
    }
}

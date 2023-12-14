<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Author::create([
            'name' => 'Test',
        ]);
        \App\Models\Article::create([
            'title' => 'Test',
            'content' => 'test test test',
            'author_id' => \App\Models\Author::first()->id,
            'publication_at' => Carbon::now(),
        ]);
    }
}

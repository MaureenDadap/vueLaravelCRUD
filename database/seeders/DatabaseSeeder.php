<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

use function GuzzleHttp\Promise\all;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                GenreSeeder::class,
                BookSeeder::class,
                BookGenreJunctionSeeder::class,
            ]
        );

       

        // Book::all()->genres()->attact();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Thriller', 'Horror', 'Romance', 'Sci-fi', 'Action', 'Non-fiction'];

        foreach ($genres as $genre) {
            Genre::create([
                'genre_name' => $genre,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookGenreJunction;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookGenreJunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $book = Book::all();
        $book->each(function (Book $book) {
            $book->genres()->attach(
                rand(1, 6)
            );
        });
    }
}

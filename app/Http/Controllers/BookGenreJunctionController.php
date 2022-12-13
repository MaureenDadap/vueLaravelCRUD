<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookGenreJunctionCollection;
use App\Models\BookGenreJunction;
use Illuminate\Http\Request;

class BookGenreJunctionController extends Controller
{
    public function index()
    {
        return new BookGenreJunctionCollection(BookGenreJunction::all());
    }

    public function store(Request $request)
    {

        $genre_ids = $request->get('genre_ids');

        foreach ($genre_ids as $genre) {
            $book_genre = new BookGenreJunction([
                'book_id' => $request->get('book_id'),
                'genre_id' => $genre
            ]);
            $book_genre->save();
        }

        return response()->json('success');
        // return response($request);
    }
}

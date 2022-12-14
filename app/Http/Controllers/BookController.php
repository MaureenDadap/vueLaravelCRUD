<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookGenreJunctionCollection;
use App\Http\Resources\GenreCollection;
use App\Models\Book;
use App\Models\BookGenreJunction;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use function GuzzleHttp\Promise\all;

class BookController extends Controller
{
  public function index()
  {
    $books = Book::paginate(25);
    foreach ($books as $book) {
      $book->genres;
    }

    // $books->where('titles', '>', 100)->paginate(25);
    return response($books);
    // return new BookCollection($books);
  }

  public function store(Request $request)
  {
    $book = new Book([
      'title' => $request->get('title'),
      'author' => $request->get('author'),
      'description' => $request->get('description'),
      'year' => $request->get('year')
    ]);

    $book->save();
    // $book_id = Book::latest()->first()->id;

    // $genre_ids = [];
    $genres = $request->get('genres');

    foreach ($genres as $genre) {
      $book->genres()->attach($genre['id']);
      // array_push($genre_ids, $genre['id']);
    }

    // $book->genres()->sync($book_id);

    return response()->json();
  }

  public function show($id)
  {
    $book = Book::find($id);
    $book->genres;
    return response()->json($book);
  }

  public function update($id, Request $request)
  {
    $book = Book::find($id);
    $book->update($request->all());

    $genre_ids = [];
    $genres = $request->get('genres');

    foreach ($genres as $genre) {
      array_push($genre_ids, $genre['id']);
    }

    $book->genres()->sync($genre_ids);
    return response()->json('Book updated!');
  }

  public function destroy($id)
  {
    $book = Book::find($id);
    $book->delete();
    return response()->json('Book deleted!');
  }
}

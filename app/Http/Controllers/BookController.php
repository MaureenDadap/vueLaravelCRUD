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

    $books = Book::with('genres')->when(request('search', '') != '', function ($query) {
      $query
        ->join('book_genre_junctions as map', 'map.book_id', '=', 'books.id')
        ->join('genres as genre', 'map.genre_id', '=', 'genre.id')
        ->where(function ($q) {
          $q->where('books.title', 'LIKE', '%' . request('search') . '%')
            ->orWhere('books.author', 'LIKE', '%' . request('search') . '%')
            ->orWhere('books.year', 'LIKE', '%' . request('search') . '%')
            ->orWhere('genre.genre_name', 'LIKE', '%' . request('search') . '%');
        });
    })->paginate(10);

    return new BookCollection($books);
  }

  public function store(Request $request)
  {

    $this->validate($request, [
      'title' => 'required',
      'author' => 'required',
      'description' => 'required',
      'year' => 'required|digits:4',
      'genres' => 'required',
    ]);

    $book = new Book([
      'title' => $request->get('title'),
      'author' => $request->get('author'),
      'description' => $request->get('description'),
      'year' => $request->get('year')
    ]);

    $book->save();

    $genres = $request->get('genres');
    foreach ($genres as $genre) {
      $book->genres()->attach($genre['id']);
    }

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

    $this->validate($request, [
      'title' => 'required',
      'author' => 'required',
      'description' => 'required',
      'year' => 'required|digits:4',
      'genres' => 'required',
    ]);

    $book = Book::find($id);
    $book->update($request->all());

    $genre_ids = [];
    $genres = $request->get('genres');

    foreach ($genres as $genre) {
      array_push($genre_ids, $genre['id']);
    }

    $book->genres()->sync($genre_ids);
    return response()->json();
  }

  public function destroy($id)
  {
    $book = Book::find($id);
    BookGenreJunction::where('book_id', $id)->delete();

    $book->delete();
    return response()->json();
  }
}

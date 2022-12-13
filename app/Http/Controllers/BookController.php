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
    // $books = Book::select(
    //   'books.id as id',
    //   'title',
    //   'author',
    //   'description',
    //   'year',
    //   'genre_name as genres'
    // )
    //   ->join(
    //     'book_genre_junctions',
    //     'books.id',
    //     '=',
    //     'book_genre_junctions.book_id',
    //   )
    //   ->join(
    //     'genres',
    //     'book_genre_junctions.genre_id',
    //     '=',
    //     'genres.id'
    //   )
    //   ->get();

    // $books = Book::find(1)->genres()->genre_name;
    // $genres = Book::all()->genres;

    $books = Book::all();
    // foreach($books as $book) {
    //   $id = $book['id'];
    //   $book->
    // }

    // $genres = BookGenreJunctionCollection::find(1)->get();
    // foreach ($books as $book) {
    //   $genres = BookGenreJunction::with('books')->where('book_id', $book['id'])->get();      // $book->concat($genres);
    // }

    // foreach ($collection as $book) {
    //   $bookGenres = BookGenreJunction::find(1)->genres;
    //   $book->push($bookGenres);
    //   $book->push('test');
    // }

    return new BookCollection($books);
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
    $book_id = Book::latest()->first()->id;

    $book->genres()->attach($book_id);

    return response()->json($book_id);
  }

  public function show($id)
  {
    $book = Book::find($id);
    $genres = $book->genres;
    return response()->json([$book, $genres]);
  }

  public function update($id, Request $request)
  {
    $book = Book::find($id);
    $book->update($request->all());
    return response()->json('Book updated!');
  }

  public function destroy($id)
  {
    $book = Book::find($id);
    $book->delete();
    return response()->json('Book deleted!');
  }
}

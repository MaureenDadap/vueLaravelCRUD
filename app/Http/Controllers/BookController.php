<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
  public function index()
  {
    $books = new BookCollection(Book::all());

    foreach ($books as $book) {
      $book['created_at'] = Carbon::parse($book['created_at']->format('d-m-y'));
    }

    return $books;
  }

  public function store(Request $request)
  {
    $book = new Book([
      'title' => $request->get('title'),
      'author' => $request->get('author'),
      'description' => $request->get('description'),
      'genre' => $request->get('genre'),
      'year' => $request->get('year')
    ]);

    $book->save();

    return response()->json('success');
  }

  public function show($id)
  {
    $book = Book::find($id);
    return response()->json($book);
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

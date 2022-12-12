<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function index()
  {
    return new BookCollection(Book::all());
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
}

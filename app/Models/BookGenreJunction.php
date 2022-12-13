<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenreJunction extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'genre_id',
    ];

    // public function genres() {
    //     return $this->belongsTo(Genre::class);
    // }

    // public function books() {
    //     return $this->belongsTo(Book::class);
    // }
}

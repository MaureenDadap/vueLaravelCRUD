<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'genre_name',
    ];

    // public function books() {
    //     return $this->hasMany(BookGenreJunction::class, 'genre_id', 'id');
    // }

    public function books() {
        return $this->belongsToMany(Book::class, 'book_genre_junctions');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'year'
    ];

    // public function genres(): HasMany {
    //     return $this->hasMany(BookGenreJunction::class, 'book_id', 'id');
    // }


    public function genres() {
        return $this->belongsToMany(Genre::class, 'book_genre_junctions');
    }
}

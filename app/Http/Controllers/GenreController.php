<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreCollection;
use App\Models\Genre as ModelsGenre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return new GenreCollection(ModelsGenre::all());
    }
}

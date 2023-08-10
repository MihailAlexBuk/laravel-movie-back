<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function getGenres()
    {
        $genres = Genre::all();
        return GenreResource::collection($genres);
    }
}

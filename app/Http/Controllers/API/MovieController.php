<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovies()
    {
        $movies = Movie::all();
        return MovieResource::collection($movies);
    }

    public function getMovie(string $id)
    {
        $movie = Movie::where('id', $id)->get();
        return MovieResource::collection($movie);
    }

    public function getMovieByCategory(string $id)
    {
        $movies = Movie::query()->whereHas('category', function($query) use ($id){
            return $query->where('id', $id);
        })->get();
        return MovieResource::collection($movies);
    }

    public function getMovieByActor(string $id)
    {
        $movies = Movie::query()->whereHas('actors', function($query) use ($id){
            return $query->where('id', $id);
        })->get();
        return MovieResource::collection($movies);
    }

    public function getMovieByGenre(string $id)
    {
        // $movies = Movie::query()->whereHas('genres', function($query) use ($id){
        //     return $query->where('id', $id);
        // })->get();

        $movies = 
        return MovieResource::collection($movies);
    }

    public function getMovieByProducer(string $id)
    {
        $movies = Movie::query()->whereHas('producers', function($query) use ($id){
            return $query->where('id', $id);
        })->get();
        return MovieResource::collection($movies);
    }

    public function getMovieByCountry(string $id)
    {
        $movies = Movie::query()->whereHas('countries', function($query) use ($id){
            return $query->where('id', $id);
        })->get();
        return MovieResource::collection($movies);
    }
}

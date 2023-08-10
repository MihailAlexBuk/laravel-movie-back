<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }

    public function producers(){
        return $this->belongsToMany(Producer::class, 'movie_producers', 'movie_id', 'producer_id');
    }

    public function countries(){
        return $this->belongsToMany(Country::class, 'movie_countries', 'movie_id', 'country_id');
    }
}

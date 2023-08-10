<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'year' => $this->year,
            'kinopoisk_id' => $this->kinopoisk_id,
            'rating_imdb' => $this->rating_imdb,
            'rating_kinopoisk' => $this->rating_kinopoisk,
            'poster' => $this->poster,
            'category' => new CategoryResource($this->category),
            'countries' => $this->countries,
            'actors' => $this->actors,
            'genres' => $this->genres,
            'producers' => $this->producers,
        ];
    }
}

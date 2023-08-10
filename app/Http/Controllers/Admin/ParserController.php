<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parser\UploadRequest;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Producer;
use Illuminate\Support\Facades\Storage;

class ParserController extends Controller
{
    public function index()
    {
        return view('admin.parser.index');
    }

    public function upload(UploadRequest $request)
    {
        $data = $request->validated();
        $data['json_file'] = Storage::disk('public')->put('/files', $data['json_file']);
        $categories = Category::all();

        $objects = json_decode(file_get_contents(public_path(Storage::url('public/'.$data['json_file']))), true)['movies'];

        foreach($categories as $category){
            foreach($objects as $object){

                $movie = Movie::create([
                    "title" => $object['title'],
                    "description" => null === $object['description'] ? ' ' : $object['description'],
                    "year" => null === $object['year'] ? ' ' : $object['year'],
                    "kinopoisk_id" => null === $object['kinopoisk_id'] ? ' ' : $object['kinopoisk_id'],
                    "rating_imdb" => null === $object['rating_imdb'] ? ' ' : $object['rating_imdb'],
                    "rating_kinopoisk" => null === $object['rating_kinopoisk'] ? ' ' : $object['rating_kinopoisk'],
                    "poster" => $object['frames'][0],
                    "category_id" => $category['id']
                ]);

                $countries = $this->check($object['countries'], new Country());
                $actors = $this->check($object['actors'], new Actor());
                $producers = $this->check($object['directors'], new Producer());
                $genres = $this->check($object['genres'], new Genre());

                $movie->countries()->attach($countries);
                $movie->actors()->attach($actors);
                $movie->producers()->attach($producers);
                $movie->genres()->attach($genres);

            }
        }

        return $this->redirectToRoute('admin.movie.index');;
    }

    public function check($object, $model): Array
    {
        $titleIds = [];
        foreach ($object as $name){
            if(!$model::query()->where('title', $name)->exists()){
                $title = $model::create(['title' => $name]);
                $title = $title['id'];
            }else{
                $title = $model::where('title', $name)->first('id');
                $title = $title['id'];
            }
            array_push($titleIds, $title);
        }
        return $titleIds;
    }
}

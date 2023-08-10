@extends('admin.main.index')

@section('title')
Редактировать
@endsection

@section('content')

   <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование {{movie.category.title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{path('index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{path('movies')}}">Фильмы</a></li>
                        <li class="breadcrumb-item active">Редактирование фильма</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">
                    <form action="{{path('movie_update', {id: movie.id})}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="title" value="{{movie.title}}">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Описание</label>
                            <textarea name="desc" id="summernote" >{{movie.description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Год</label>
                            <input type="text" class="form-control" name="year" value="{{movie.year}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Страна </label>
                            <input type="text" class="form-control" name="country" value="{{movie.country}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Kinopoisk id </label>
                            <input type="text" class="form-control" name="kinopoisk_id" value="{{movie.kinopoiskid}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Рейтинг IMDb </label>
                            <input type="text" class="form-control" name="rating_imdb" value="{{movie.ratingimdb}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Рейтинг KinoPoisk </label>
                            <input type="text" class="form-control" name="rating_kinopoisk" value="{{movie.ratingkinopoisk}}">
                        </div>
                        <div class="form-group">
                            <label>Постер</label>
                            <div>
                                <img width="300" height="150" src="{{movie.poster}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Изменить категорию</label>
                            <select name="category_id" class="form-control">
                                {% for category in categories %}
                                    <option value="{{category.id}}" {{movie.category.title == category.title ? 'selected' : ''}} >{{category.title}}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Изменить жанр</label>
                            <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Выберите жанр" style="width: 100%;">
                                {% for genre in genres %}
                                    <option value="{{genre.id}}" {% for mov in movie.genre %}{{mov.title == genre.title ? ' selected ' : ''}}{% endfor %}>{{genre.title}}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Изменить актеров</label>
                            <select class="select2" name="actor_ids[]" multiple="multiple" data-placeholder="Выберите актеров" style="width: 100%;">
                                {% for actor in actors %}
                                    <option value="{{actor.id}}" {% for mov in movie.actor %}{{mov.title == actor.title ? ' selected ' : ''}}{% endfor %}>{{actor.title}}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Изменить режисера</label>
                            <select class="select2" name="producer_ids[]" multiple="multiple" data-placeholder="Выберите продюсера" style="width: 100%;">
                                {% for producer in producers %}
                                    <option value="{{producer.id}}" {% for mov in movie.producer %}{{mov.title == producer.title ? ' selected ' : ''}}{% endfor %}>{{producer.title}}</option>
                                {% endfor %}
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success w-100" value="Применить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

@extends('admin.main.index')

@section('title')
Фильмы/Мультфильмы/Сериалы
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Фильмы, мультфильмы, сериалы</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 mb-3">
                <a href="/" class="btn btn-block btn-primary">Добавить</a>
            </div>
            <div class="col-4 mb-3 ml-3">
                <form class="d-flex" action="" method="POST">
                    <input type="text" class="form-control ml-1" name="search" id="exampleInputEmail1" placeholder="Поиск...">
                    <input type="submit" class="btn btn-primary ml-2" value="Поиск">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>ID Kinopoisk</th>
                                <th colspan="2">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->id}}</td>
                                    <td>{{$movie->title}}</td>
                                    <td>{{$movie->category->title}}</td>
                                    <td>{{$movie->kinopoisk_id}}</td>
                                    <td><a href="{{route('movies.edit', $movie->id)}}"><i class="fas fa-pencil-alt text-success"></i></a></td>
                                    <td>
                                        <form action="{{route('movies.destroy', $movie->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 30px 400px">
            {{$movies->links()}}
        </div>

    </div>
</section>


@endsection

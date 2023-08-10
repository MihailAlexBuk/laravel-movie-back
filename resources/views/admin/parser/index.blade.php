@extends('admin.main.index')

@section('title')
Парсинг
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить файл .json</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mb-3">
                @error('json_file')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <form class="d-flex" action="{{route('admin.parser.upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" multiple class="form-control" name="json_file">
                    <input type="submit" class="btn btn-primary ml-2" value="Парсить">
                </form>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12 bg-warning">
            <div class="card bg-black d-block">
                <!-- /.card-header -->
                <div class="  pl-3 mt-2 card-body table-responsive">
                    <p>Пример .json файла</p>
                    <code>{<br>
                        "title": "Джентльмены",<br>
                        "description": "Наркобарон хочет уйти на покой, но криминальный мир не отпускает. Успешное возвращение Гая Ричи к корням",<br>
                        "duration": "113 мин. / 01:53ч.",<br>
                        "year": "2019",<br>
                        "country": ["Великобритания", "США"],<br>
                        "kinopoisk_id": "1143242",<br>
                        "rating_imdb": "7.4",<br>
                        "rating_kinopoisk": "8.6",<br>
                        "poster": "URL",<br>
                        "actors": [ "Мэттью МакКонахи", "Чарли Ханнэм", "Генри Голдинг", "Хью Грант", "Мишель Докери", "Джереми Стронг", "Эдди Марсан", "Джейсон Вонг", "Колин Фаррелл", "Лин Рене" ],<br>
                        "producers": ["Гай Ричи"],<br>
                        "genres": ["криминал", "комедия", "боевик"],<br>
                        "category": "Фильм"/"Мультфильм"/"Сериал",
                            <br>}</code>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

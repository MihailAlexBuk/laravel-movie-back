@extends('admin.main.index')

@section('title')
Редактирование категории
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Категории</a></li>
                        <li class="breadcrumb-item active">Редактирование категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <form action="{{route('categories.update', $category->id)}}" method="POST" class="col-4">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{$category->title}}">
                        @error('title')
                        <div class="text-danger">Поле обязательное для заполнения</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </form>

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection

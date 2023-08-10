<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <p class="animation__snake">Admin</p>
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a href="/" class='btn btn-outline-primary' type="submit">Вернуться</a>
        @auth
            <li class="nav-item ml-2">
                <form action="" method="POST">
                    @csrf
                    <input class='btn btn-outline-danger' type="submit" value="Выйти">
                </form>
            </li>
        @endauth
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="" class="brand-link">
            <span class="brand-text font-weight-light">Админ панель</span>
        </a>

        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('movies.index')}}" class="nav-link">
                            <i class="nav-icon fas  fa-list-alt"></i>
                            <p>Фильмы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.parser.index')}}" class="nav-link">
                            <i class="nav-icon fas  fa-list-alt"></i>
                            <p>Парсер</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="/" class="nav-link">
                          <i class="nav-icon fas  fa-envelope"></i>
                          <p>Почта</p>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>Комментарии</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("categories.index")}}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Категории</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper mt-5">
        @yield('content')
      </div>

  </div>



<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#summernote').summernote({
      toolbar:[
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ],
        tabDisable: true
    });

    $('.select2').select2()


    $(function () {
      bsCustomFileInput.init();
    });
  });
</script>
</body>
</html>

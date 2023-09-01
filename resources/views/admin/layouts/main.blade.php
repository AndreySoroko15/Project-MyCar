<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

      <!-- Scripts -->
      <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <p class="animation__shake"> MyCar </p>
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
      <li class="nav-item">
          <a class="nav-link" href="{{ route('web.main.index') }}">Сайт</a>
      </li>

      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

    </ul>
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.main.index') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light">MyCar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
            <li class="nav-item">
                <a href="{{ route('call-request.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p> Заявки </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('cars.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-car"></i>
                    <p> Автомобили </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p> Категории </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p> Марки авто </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('bodyType.index') }}" class="nav-link">
                    <i class="nav-icon fas"></i>
                    <p> Тип кузова </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('driveSystem.index') }}" class="nav-link">
                    <i class="nav-icon fas"></i>
                    <p> Тип привода </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('engineType.index') }}" class="nav-link">
                    <i class="nav-icon fas"></i>
                    <p> Тип двигателя </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('transmissionType.index') }}" class="nav-link">
                    <i class="nav-icon fas"></i>
                    <p> Тип КПП </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('color.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-palette"></i>
                    <p> Цвета </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p> Пользователи </p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
        @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>
        <a href="{{ route('admin.main.index') }}"> MyCar </a>
    </strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }} "></script>
<!-- wow.min.js  анимации -->
<script src=" {{ asset('adminlte/dist/js/wow.min.js') }} "></script>
<!-- jQuery UI 1.11.4 -->
<script src=" {{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }} "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" {{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- ChartJS -->
<!-- overlayScrollbars -->
<script src=" {{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
<!-- AdminLTE App -->
<script src=" {{ asset('adminlte/dist/js/adminlte.js') }} "></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $('.colors').select2()
</script>

</body>
</html>
@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
          </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-4">
            <!-- small box -->
            @inject('callRequests', 'App\Http\Controllers\CallRequestController')
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $callRequests->countCallRequests() }}</h3>
                <p>Заявки</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('cars.index') }}" class="small-box-footer"> Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            @inject('users', 'App\Http\Controllers\UserController')
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $users->countUsers() }}</h3>
                <p>Пользователи</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('user.index') }}" class="small-box-footer"> Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            @inject('cars', 'App\Http\Controllers\CarsController')
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $cars->countCars() }}</h3>
                <p>Автомобили</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('cars.index') }}" class="small-box-footer"> Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
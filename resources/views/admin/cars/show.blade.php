@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $car->brand_name }} {{ $car->model }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{ route('main.index') }}">Главная </a>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="pull-right mb-3">
          <form class="d-block" action="{{ route('cars.update', $car->id) }}" method="post">
            <a class="btn btn-primary mr-2" href="{{ route('cars.edit', $car->id) }}">Редактировать</a>
            @csrf
          </form>
        </div>


        <div class="row ml-1 mr-5">
          <table class="table table-bordered table-hover">
            <tr>
              <td width="30%">ID</td>
              <td>{{ $car->id }}</td>
            </tr>
            <tr>
              <td>Марка авто</td>
              <td>{{ $car->brand_name }}</td>
            </tr>
            <tr>
              <td>Модель</td>
              <td>{{ $car->model }}</td>
            </tr>
            <tr>
              <td>Цвет</td>
              <td>{{ $car->color_name }}</td>
            </tr>
            <tr>
              <td>Год выпуска</td>
              <td>{{ $car->year }}</td>
            </tr>
            <tr>
              <td>Категория</td>
              <td>{{ $car->category_name }}</td>
            </tr>
            <tr>
              <td>Описание</td>
              <td>{{ $car->description }}</td>
            </tr>
            <tr>
              <td>Цена</td>
              <td>{{ $car->price }}</td>
            </tr>
            <tr>
              <td>Путь к изображению</td>
              <td>{{ $car->image }}</td>
            </tr>
          </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
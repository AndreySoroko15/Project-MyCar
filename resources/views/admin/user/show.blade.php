@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователь: {{$user->name}} {{ $user->surname }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{ route('admin.main.index') }}">Главная </a>
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
          <form class="d-block" action="{{ route('user.update', $user->id) }}" method="post">
            <a class="btn btn-primary mr-2" href="{{ route('user.edit', $user->id) }}">Редактировать</a>
            @csrf
            <!-- @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button> -->
          </form>
        </div>


        <div class="row ml-1 mr-5">
          <table class="table table-bordered table-hover">
            <tr>
              <td width="25%">ID</td>
              <td>{{ $user->id }}</td>
            </tr>
            <tr>
              <td>Имя</td>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <td>Фамилия</td>
              <td>{{ $user->surname }}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <td>Возраст</td>
              <td>{{ $user->age }}</td>
            </tr>
            <tr>
              <td>Пол</td>
              <td>{{ $user->gender }}</td>
            </tr>
            <tr>
              <td>Адрес</td>
              <td>{{ $user->address }}</td>
            </tr>
          </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
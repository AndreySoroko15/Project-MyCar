@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить пользователя</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Имя">
            </div>

            <div class="form-group">
                <input type="text" value="{{ old('surname') }}" name="surname" class="form-control" placeholder="Фамилия">
            </div>

            <div class="form-group">
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Пароль">
            </div>

            <div class="form-group">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль">
            </div>

            <div class="form-group">
                <input type="number" value="{{ old('age') }}" name="age" class="form-control" placeholder="Возраст">
            </div>

            <div class="form-group">
              <select class="custom-select form-control-border" name="gender" id="exampleSelectBorder">
                <option value disabled selected style="background-color: #f5f5f5;">Выберете пол</option>
                <option {{ old('gender') }}>Мужской</option>
                <option {{ old('gender') }}>Женский</option>
              </select>
            </div>

            <div class="form-group">
                <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Адрес">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Добавить">
            </div>

          </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
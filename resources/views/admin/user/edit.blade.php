@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать пользователя</h1>
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

          <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Имя">
            </div>
            <div class="form-group">
                <input type="text" value="{{ $user->surname }}" name="surname" class="form-control" placeholder="Фамилия">
            </div>

            <!-- {{ $user->age ?? old('age') }} - это конструкция, называемая оператором объединения с null (??). Он используется для проверки наличия значения $user->age. Если $user->age имеет значение null, то будет использовано значение функции old('age'). -->

            <div class="form-group">
                <input type="number" value="{{ $user->age }}" name="age" class="form-control" placeholder="Возраст">
            </div>

            <div class="form-group">
              <select class="custom-select form-control-border" id="exampleSelectBorder">
                <option value disabled selected style="background-color: #f5f5f5;">Выберете пол</option>
                <option {{ $user->gender == 'Мужской' ? ' selected ' : '' }}>Мужской</option>
                <option {{ $user->gender == 'Женский' ? ' selected ' : '' }}>Женский</option>
              </select>
            </div>
            <div class="form-group">
                <input type="text" value="{{ $user->address }}" name="address" class="form-control" placeholder="Адрес">
            </div>

            <div class="form-group">
                <input type="submit" action="{{ route('user.update', $user->id) }}"class="btn btn-primary" value="Сохранить">
            </div>
          </form>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
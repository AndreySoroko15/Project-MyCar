@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать цвет</h1>
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

          <form action="{{ route('color.update', $color->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <input type="text" name="color_name" value="{{ $color->color_name }}" class="form-control" placeholder="Наименование">
            </div>

            <div class="form-group">
                <input type="submit" action="{{ route('color.update', $color->id) }}"class="btn btn-primary" value="Редактировать">
            </div>
          </form>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
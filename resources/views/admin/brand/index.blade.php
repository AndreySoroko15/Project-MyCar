@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-1">Марка авто</h1>
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
          <a class="btn btn-primary" href="{{ route('brand.create') }}">Добавить</a>
        </div>

        <div class="row ml-1">
          <table class="table table-bordered">
            <tr>
              <th>Наименование</th>
              <th>Действие</th>
              <!-- <th width="280px">Action</th> -->
            </tr>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->brand_name }}</td>
                <td>
                  <form class="d-block" action="{{ route('brand.destroy', $brand->id) }}" method="POST">
                    <a class="btn btn-primary mr-2" href="{{ route('brand.edit', $brand->id) }}">Редактировать</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
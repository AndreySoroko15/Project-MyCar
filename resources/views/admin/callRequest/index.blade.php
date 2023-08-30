@extends('admin.layouts.main')

@section('content')
<script src="{{ asset('js/deleteButtonAsync.js') }}" defer></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-1">Заявки</h1>
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
        <div class="row ml-1">
          <table class="table table-bordered">
            <tr>
              <th>Имя</th>
              <th>Почта</th>
              <th>Номер телефона</th>
              <th>id авто</th>
              <th>Время</th>
              <th>Действие</th>
              <!-- <th width="280px">Action</th> -->
            </tr>
            @foreach($call_requests as $call_request)
            <tr class="cortege">
                <td>{{ $call_request->name }}</td>
                <td>{{ $call_request->email }}</td>
                <td>{{ $call_request->phone }}</td>
                <td>{{ $call_request->car_id }}</td>
                <td>{{ $call_request->created_at }}</td>
                <td>
                  <form class="d-block form-delete" action="{{ route('call-request.destroy', $call_request->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="call_request_id" id="call_request_id" value="{{ $call_request->id }}">
                    <button type="submit" class="btn btn-danger delete_button">Удалить</button>
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
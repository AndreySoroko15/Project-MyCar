@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <form action="{{ route('cars.update', $car->id) }}" class="col-md-6" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
              <select name="brand_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Выберете марку авто</option>
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
              @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <input type="model" name="model" value="{{ $car->model }}" class="form-control" placeholder="Модель">
            </div>

            <div class="form-group">
                <input type="year" name="year" value="{{ $car->year }}" class="form-control" placeholder="Год выпуска">
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание">{{ $car->description }}</textarea>
            </div>
            
            <div class="form-group">
                <input type="price" name="price" value="{{ $car->price }}" class="form-control" placeholder="Цена">
            </div>

            <div class="form-group">
                <input type="count" name="count" value="{{ $car->count }}" class="form-control" placeholder="Количество">
            </div>

            <div class="form-group">
                    <div class="input-group custom-file"">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{ $car->image }}</label>
                    </div>
                  </div>
            
            <div class="form-group">
              <select name="category_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Выберете категорию</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
              @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <select name="color_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Выберете цвет</option>
              @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
              @endforeach
              </select>
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
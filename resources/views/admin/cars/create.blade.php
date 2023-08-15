@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить автомобиль</h1>
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
          <!-- без enctype="multipart/form-data" файл не отправится -->
          <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
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
              <input type="model" name="model" class="form-control" placeholder="Модель">
            </div>

            <div class="form-group">
                <input type="year" name="year" class="form-control" placeholder="Год выпуска">
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"></textarea>
            </div>
            
            <div class="form-group">
                <input type="price" name="price" class="form-control" placeholder="Цена">
            </div>

            <div class="form-group">
                <input type="count" name="count" class="form-control" placeholder="Количество">
            </div>

            <div class="form-group">
                    <div class="input-group custom-file"">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Выберете изображение</label>
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
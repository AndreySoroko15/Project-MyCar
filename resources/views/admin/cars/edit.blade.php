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

        <form action="{{ route('cars.update', $car->id) }}" class="col-md-6" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="form-group">
              <select name="brand_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Выберете марку авто</option>
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @if($brand->id == $car->brand_id) selected @endif>{{ $brand->brand_name }}</option>
              @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <input type="text" name="model" value="{{ $car->model }}" class="form-control" placeholder="Модель">
            </div>

            <div class="form-group">
                <input type="text" name="year" value="{{ $car->year }}" class="form-control" placeholder="Год выпуска">
              </div>

            <div class="form-group">
              <select name="category_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Выберете категорию</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $car->category_id) selected @endif>{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
              
            <div class="form-group">
                <input type="text" name="car_mileage" value="{{ $car->car_mileage }}" class="form-control" placeholder="Пробег">
            </div>
                
            <div class="form-group">
              <select name="body_type_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Тип кузова</option>
              @foreach ($bodyTypes as $bodyType)
                <option value="{{ $bodyType->id }}" @if($bodyType->id == $car->body_type_id) selected @endif>{{ $bodyType->body_type }}</option>
              @endforeach
              </select>
            </div>
                
            <div class="form-group">
              <select name="drive_system_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Тип привода</option>
              @foreach ($driveSystems as $driveSystem)
                <option value="{{ $driveSystem->id }}" @if($driveSystem->id == $car->drive_system_id) selected @endif>{{ $driveSystem->drive_system }}</option>
              @endforeach
              </select>
            </div>
                
            <div class="form-group">
              <select name="engine_type_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Тип двигателя</option>
              @foreach ($engineTypes as $engineType)
                <option value="{{ $engineType->id }}" @if($engineType->id == $car->engine_type_id) selected @endif>{{ $engineType->engine_type }}</option>
              @endforeach
              </select>
            </div>
                
            <div class="form-group">
              <select name="transmission_type_id" class="form-control select2bs4" style="width: 100%;">
              <option value disabled selected style="background-color: #f5f5f5;">Тип КПП</option>
              @foreach ($transmissionTypes as $transmissionType)
                <option value="{{ $transmissionType->id }}" @if($transmissionType->id == $car->transmission_type_id) selected @endif>{{ $transmissionType->transmission_type }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание">{{ $car->description }}</textarea>
            </div>
            
            <div class="form-group">
                <input type="text" name="price" value="{{ $car->price }}" class="form-control" placeholder="Цена">
            </div>

            <div class="form-group">
                <div class="input-group custom-file"">
                <label class="custom-file-label" for="exampleInputFile">{{ $car->image }}</label>
                    <input name="image" value="{{ $car->image }}" type="file" class="custom-file-input" id="exampleInputFile">
                </div>
            </div>
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </div>
          </form>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
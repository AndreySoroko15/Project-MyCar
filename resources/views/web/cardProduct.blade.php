@extends('web.layouts.main')

@section('content')

<!-- Product section-->
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{ asset('/storage/images/cars/' . $car->image) }}" alt="..." />
                    </div>

                    <div class="col-md-6 product-info">
                        <h1 class="display-5 fw-bolder fs-2">{{ $car->brand_name }} {{ $car->model }} 
                            <span style="color: orange;"> {{ $car->price}} $ </span>
                        </h1>

                        <div class="fs-5 mb-3">
                            <p><span class="fw-semibold">Год выпуска:</span> {{ $car->year }}</p>
                            <p><span class="fw-semibold">Тип кузова:</span> {{ $car->body_type }}</p>
                            <p><span class="fw-semibold">Цвет:</span> {{ $car->color_name }}</p>
                            <p><span class="fw-semibold">Пробег:</span> {{ $car->car_mileage }} км</p>
                            <p><span class="fw-semibold">Тип привода:</span> {{ $car->drive_system }}</p>
                            <p><span class="fw-semibold">Тип двигателя:</span> {{ $car->engine_type }}</p>
                            <p><span class="fw-semibold">Тип КПП:</span> {{ $car->transmission_type }}</p>
                        </div>

                        <div>
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>

                    </div>
                </div>
                <div>
                    <p class="fw-bold mt-4 fs-3">Описание: </p>
                    <p class="lead">{{ $car->description }}</p>
                </div>
            </div>
        </section>
        
@endsection
@extends('web.layouts.main')

@section('content')

<!-- Product section-->
<script src="{{ asset('js/PoPUpBlock.js') }}"></script>
<section class="py-5 product-section">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="{{ asset('/storage/images/cars/' . $product->image) }}" alt="..." />
                    </div>

                    <div class="col-md-6 product-info">
                        <h1 class="display-5 fw-bolder fs-2">{{ $product->brand_name }} {{ $product->model }} 
                            <span style="color: orange;"> {{ $product->price}} $ </span>
                        </h1>

                        <div class="fs-5 mb-3">
                            <p><span class="fw-semibold">Год выпуска:</span> {{ $product->year }}</p>
                            <p><span class="fw-semibold">Тип кузова:</span> {{ $product->body_type }}</p>
                            <p><span class="fw-semibold">Цвет:</span> {{ $product->color_name }}</p>
                            <p><span class="fw-semibold">Пробег:</span> {{ $product->car_mileage }} км</p>
                            <p><span class="fw-semibold">Тип привода:</span> {{ $product->drive_system }}</p>
                            <p><span class="fw-semibold">Тип двигателя:</span> {{ $product->engine_type }}</p>
                            <p><span class="fw-semibold">Тип КПП:</span> {{ $product->transmission_type }}</p>
                        </div>
                    
                        <div class="d-flex">
                        <!-- contact with us -->
                            <div class="pt-2">
                                <button type="button" class="btn btn-dark custom-button" id="pop-up-form-button">Получить консультацию</button>
                            </div>

                        <!-- Like -->
                            <div class="like-product d-flex align-items-center justify-content-center ms-5">
                                            <form action="{{ route('like', $product->id) }}" method="post" class="like_form">
                                                @csrf
                                                <input type="hidden" name="product_id" id="like_product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="_token" id="like_token" value="{{ csrf_token() }}">

                                                @auth()
                                                    <button type="submit" class="border-0 bg-transparent btn-lg like_button">
                                                        @if(auth()->user()->likedCars->contains($product))
                                                            <i  class="bi bi-suit-heart like-icon" 
                                                                style="color: orange; font-size: 35px"></i>
                                                        @else
                                                            <i  class="bi bi-suit-heart like-icon" 
                                                                style="color: #b4b4b4; font-size: 35px"></i>
                                                        @endif
                                                    </button>
                                                @endauth

                                                @guest()
                                                    <i  class="bi bi-suit-heart like-icon" style="color: #b4b4b4; font-size: 35px"></i>
                                                @endguest
                                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="fw-bold mt-4 fs-3">Описание: </p>
                    <p class="lead">{{ $product->description }}</p>
                </div>
            </div>
        </section>

        <div class="pop-up-block">
            <div class="close-xmark">
                <i class="bi bi-x-lg"></i>
            </div>
            
            <form action="#" method="post" class="contact-form text-center">
                <label class="fw-semibold fs-5 m-4">Получить консультацию</label>
                
                @if(auth()->check())
                    <input value="{{ $user->name }}" type="text" name="user_name" class="form-control m-2" placeholder="Имя">
                    <input value="{{ $user->phone }}" type="tel" name="phone" class="form-control m-2" placeholder="+375(XX)XXX-XX-XX">
                @else
                    <input type="text" name="user_name" class="form-control m-2" placeholder="Имя">
                    <input type="tel" name="phone" class="form-control m-2" placeholder="+375(XX)XXX-XX-XX">
                @endif
            </form>
        </div>

@endsection
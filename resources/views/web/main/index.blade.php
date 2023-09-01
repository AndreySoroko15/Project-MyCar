@extends('web.layouts.main')

@section('content')
    <!-- Header-->
<div class="wrapper">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active item-1" data-bs-interval="5000">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

            <div class="carousel-item item-2" data-bs-interval="5000">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

            <div class="carousel-item item-3">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

        <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-2">
            <h1 class="mb-4 fs-2 fw-bold">Новые поступления</h1>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1 justify-content-start">
                    
            @foreach($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <a href="{{ route('cardProduct', ['id'=> $product->id, 'brand_name' => $product->brand_name, 'model' => $product->model, 'year' => $product->year]) }}">

                        <!-- Product image-->
                        <img class="card-img-top productCard" src="{{ asset('/storage/images/cars/' . $product->image) }}" alt="" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h3 class="fw-bolder">{{ $product->brand_name }} {{ $product->model}} </h3>
                                    <div class="card-params d-flex justify-content-between">
                                        <div class="card-param">
                                            <img class="card-param-img" src=" {{ asset('/imgs/engineSystem.png') }}">
                                            <p>{{ $product->engine_type }}</p>
                                        </div>
                                        <div class="card-param">
                                            <img class="card-param-img" src=" {{ asset('/imgs/bodyType.png') }}">
                                            <p>{{ $product->body_type }}</p>
                                        </div>
                                        <div class="card-param">
                                            <img class="card-param-img" src=" {{ asset('/imgs/transmissionSystem.png') }}">
                                            <p>{{ $product->transmission_type }}</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between pt-3" style="border-top: 1px solid rgb(180, 180, 180);">
                                        <div class="brief-info" style="text-align: left;">
                                            <p class="fw-semibold fs-6">Год выпуска: </p> 
                                            <p class="fw-semibold fs-6">Цена: </p>
                                        </div>
                                        
                                        <div class="info-values" style="text-align: right;">
                                            <p class="fs-6"> {{ $product->year }} г.</p> 
                                            <p class="fs-6"> {{ $product->price }} $ </p>
                                        </div>
                                        
                                        <!-- Like -->
                                        <div class="like-product d-flex align-items-center justify-content-center">
                                            @auth()
                                            <form action="{{ route('like', $product->id) }}" method="post" class="like_form">
                                                @csrf
                                                <input type="hidden" name="product_id" id="like_product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="_token" id="like_token" value="{{ csrf_token() }}">

                                                <button type="submit" class="border-0 bg-transparent btn-lg like_button">
                                                    @if(auth()->user()->likedCars->contains($product))
                                                        <i  class="bi bi-suit-heart like-icon" style="color: orange; font-size: 35px"></i>
                                                    @else
                                                        <i  class="bi bi-suit-heart like-icon" style="color: #b4b4b4; font-size: 35px"></i>
                                                    @endif
                                                </button>
                                            </form>
                                            @endauth

                                            @guest()
                                            <button class="like-icon-guest border-0 bg-transparent btn-lg">
                                                <i  class="bi bi-suit-heart like-icon" style="color: #b4b4b4; font-size: 35px"></i>
                                            </button>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </section>
</div>
    
    <div class="guest-like-block p-4 text-center">
    <div class="close-xmark">
        <i class="bi bi-x-lg"></i>
    </div>
        <p class="m-3">Для того, чтобы добавить понравившийся вам автомобиль в "Избранное", вам необходимо <a href="{{ route('login') }}">войти</a> в аккаунт, либо <a href="{{ route('register') }}">зарегестрироваться</a></p>
    </div>

@endsection

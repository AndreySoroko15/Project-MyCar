@extends('web.layouts.main')

@section('content')
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="fw-semibold">Каталог автомобилей</h1>
            </div>
        </div>
    </header>

    <!-- Search -->
    <div class="container px-4 px-lg-5 mt-5" >
    <form method="GET" action="{{ route('search') }}" class="search-form">
        @csrf
        <div class="d-flex justify-content-end">
            <div class="form-group col-md-5">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
            </div>
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-dark btn-block">Search</button>
            </div>
        </div>
    </form>
    </div>

        <!-- Section-->
    <section class="py-4">
        <div class="container px-4 px-lg-5 mt-1">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1 justify-content-start" id="cars-list">        
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
                                            <form action="{{ route('like', $product->id) }}" method="post" class="like_form">
                                                @csrf
                                                <input type="hidden" name="product_id" id="like_product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="_token" id="like_token" value="{{ csrf_token() }}">

                                                @auth()
                                                <button type="submit" class="border-0 bg-transparent btn-lg like_button">
                                                    @if(auth()->user()->likedCars->contains($product))
                                                        <i  class="bi bi-suit-heart like-icon" style="color: orange; font-size: 35px"></i>
                                                    @else
                                                        <i  class="bi bi-suit-heart like-icon" style="color: #b4b4b4; font-size: 35px"></i>
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
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>

@endsection
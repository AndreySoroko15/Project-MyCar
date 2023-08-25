@extends('web.layouts.main')

@section('content')
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">My Car</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1 justify-content-center">
                    
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
                                    <h3 class="fw-bolder">{{ $product->brand_name }} {{ $product->model}} </h5>
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

                                    <div    class="d-flex justify-content-between pt-3" style="border-top: 1px solid rgb(180, 180, 180);">

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
                                    <!-- Product price-->
                                    </div>
                                </div>
                            </div>
                            </a>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
@endsection

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
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-xs-2 justify-content-center">
                    
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
                                    <p class="fw-semibold fs-5">Год выпуска: {{ $product->year }}</p>
                                    <!-- Product price-->
                                    <p class="fw-semibold fs-5">Цена: {{ $product->price }}$ </p>
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

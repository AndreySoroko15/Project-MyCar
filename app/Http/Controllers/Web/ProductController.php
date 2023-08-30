<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\EngineType;
use App\Models\TransmissionType;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index() {

        $products = Car::  join('brands', 'cars.brand_id', '=', 'brands.id')
                        -> join('categories', 'cars.category_id', '=', 'categories.id')
                        -> join('colors', 'cars.color_id', '=', 'colors.id')
                        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
                        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
                        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
                        -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                                    'year', 'transmission_type', 'engine_type', 'body_type')
                        ->orderBy('cars.created_at', 'desc')
                        ->take(6)
                        ->paginate(3);

        // Проблема - paginate() перекрывает метод take()

        // dd($products); 

        // $html = view('web.main.index', compact('products'))->render();
        // return response()->json(['html' => $html]);

        return view('web.main.index', compact('products'));
    }

    public function allCars() {

        $products = Car::  join('brands', 'cars.brand_id', '=', 'brands.id')
                        -> join('categories', 'cars.category_id', '=', 'categories.id')
                        -> join('colors', 'cars.color_id', '=', 'colors.id')
                        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
                        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
                        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
                        -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                                    'year', 'transmission_type', 'engine_type', 'body_type')
                        ->orderBy('cars.created_at', 'desc')
                        ->paginate(6);

        return view('web.main.allProducts', compact('products'));
    }

    public function search(Request $request) {

        $search = $request->search;
            
        $products = Car::  join('brands', 'cars.brand_id', '=', 'brands.id')
                        -> join('categories', 'cars.category_id', '=', 'categories.id')
                        -> join('colors', 'cars.color_id', '=', 'colors.id')
                        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
                        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
                        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
                        -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                                    'year', 'transmission_type', 'engine_type', 'body_type')
                        ->where('brand_name', 'LIKE', "%{$search}%")
                        ->orWhere('model', 'LIKE', "%{$search}%")
                        ->orWhere(DB::raw("CONCAT(brand_name, ' ', model)"), 'LIKE', "%{$search}%")
                        ->orWhere(DB::raw("CONCAT(model, ' ', brand_name)"), 'LIKE', "%{$search}%") //не отрабатывает
                        ->orderBy('cars.created_at', 'desc')
                        ->paginate(6);

return view('web.main.allProducts', compact('products'));
    }
}

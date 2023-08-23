<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\EngineType;
use App\Models\TransmissionType;

use Illuminate\Http\Request;


class HomePageController extends Controller
{

    public function index() {

        $products = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
        -> join('categories', 'cars.category_id', '=', 'categories.id')
        -> join('colors', 'cars.color_id', '=', 'colors.id')
        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
        -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                    'year', 'transmission_type', 'engine_type', 'body_type')
        ->get();
// dd($products[0]->image);


        return view('web.main.index', compact('products'));
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Color;
use App\Models\DriveSystem;
use App\Models\EngineType;
use App\Models\TransmissionType;
use App\Models\User;

class FavoritesController extends Controller
{

    // private $userId = auth()->user()->id;

    public function index() {
        
        $products = Car::  join('brands', 'cars.brand_id', '=', 'brands.id')
                        -> join('categories', 'cars.category_id', '=', 'categories.id')
                        -> join('colors', 'cars.color_id', '=', 'colors.id')
                        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
                        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
                        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
                        ->join('car_user_like', 'cars.id' , '=', 'car_user_like.car_id')
                        -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                                    'year', 'transmission_type', 'engine_type', 'body_type')
                        ->where('car_user_like.user_id', auth()->user()->id)
                        ->get();

        return view('web.favorites', compact('products'));
    }

    public function countFavCars() {

        $count = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
                    ->join('car_user_like', 'cars.id' , '=', 'car_user_like.car_id')
                    -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                    'year', 'transmission_type', 'engine_type', 'body_type')
                    ->where('car_user_like.user_id', auth()->user()->id)
                    ->count();

        return $count;
        // return response()->json(['count' => $count]);
    }
}
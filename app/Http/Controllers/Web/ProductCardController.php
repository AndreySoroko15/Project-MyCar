<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class ProductCardController extends Controller
{

    public function index($id) {


        $product = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
        -> join('categories', 'cars.category_id', '=', 'categories.id')
        -> join('colors', 'cars.color_id', '=', 'colors.id')
        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
        -> join('drive_system', 'cars.drive_system_id', '=', 'drive_system.id')
        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
        ->select   ('cars.id', 'brand_name', 'model', 'color_name', 'year', 'category_name', 'description', 
                    'price', 'image', 'body_type', 'drive_system', 'engine_type', 'transmission_type', 'car_mileage')
        ->where('cars.id', $id)
        ->first();
        
        if(auth()->check()) {
            $user = User::select('users.id', 'name', 'phone','email')
                ->where('id', auth()->user()->id)
                ->first();

            return view('web.cardProduct', compact('product', 'user'));
        }

        // dd($id);

        return view('web.cardProduct', compact('product'));
    }
}

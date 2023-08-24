<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LikeController extends Controller
{
    public function index($product) {
        // dd(auth()->user()->likedCars()->toggle($product));

        auth()->user()->likedCars()->toggle($product);

        return redirect()->back();
    }
}

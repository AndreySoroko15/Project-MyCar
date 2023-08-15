<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke() 
    {
        return view('admin.main.index');
    }
}

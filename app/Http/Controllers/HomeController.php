<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke() 
    {
        return view('admin.main.index');
    }
}

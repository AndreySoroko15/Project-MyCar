<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;

class HomeAdminController extends Controller
{
    public function __invoke() 
    {
        return view('admin.main.index');
    }
}

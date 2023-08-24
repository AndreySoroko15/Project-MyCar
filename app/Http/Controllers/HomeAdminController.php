<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    public function index() 
    {
        return view('admin.main.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
                    -> join('categories', 'cars.category_id', '=', 'categories.id')
                    -> join('colors', 'cars.color_id', '=', 'colors.id')
                    -> select('cars.id', 'brand_name', 'model', 'year')
                    ->get();
        
        // dd($cars);

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();

        return view('admin.cars.create', compact('brands', 'categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(var_dump($request['image']));
        // dd($request['image']);
        // dd($request['color_id']);

        $request->validate([
            'brand_id' => 'required',
            'model' => 'required|string',
            'year' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'count' => 'required|integer',
            'image' => 'required',
            'category_id' => 'required',
            'color_id' => 'required',
        ]);

        $request['image'] = Storage::disk('public')->put('/images', $request['image']);
        // dd($request['image']);
        Car::create($request->all());
        

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $car = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
        -> join('categories', 'cars.category_id', '=', 'categories.id')
        -> join('colors', 'cars.color_id', '=', 'colors.id')
        ->select('cars.id', 'brand_name', 'model', 'color_name', 'year', 'category_name', 'description', 'price', 'image')
        ->first();

        // dd($car);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();

        return view('admin.cars.edit', compact('car', 'brands', 'categories', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index');
    }
}

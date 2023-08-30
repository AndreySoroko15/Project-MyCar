<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Color;
use App\Models\DriveSystem;
use App\Models\EngineType;
use App\Models\TransmissionType;
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
                    ->orderBy('cars.id', 'desc')
                    ->get();
        
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('brand_name', 'asc')->get();
        $categories = Category::all();
        $colors = Color::orderBy('color_name', 'asc')->get();
        $bodyTypes = BodyType::all();
        $driveSystems = DriveSystem::all();
        $engineTypes = EngineType::all();
        $transmissionTypes = TransmissionType::all();

        return  view('admin.cars.create', 
                compact('brands', 'categories', 'colors', 'bodyTypes', 
                        'driveSystems', 'engineTypes', 'transmissionTypes'));
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
            'image' => 'required',
            'category_id' => 'required',
            'color_id' => 'required',
            'body_type_id' => 'required',
            'drive_system_id' => 'required',
            'engine_type_id' => 'required',
            'transmission_type_id' => 'required',
            'car_mileage' => 'required|numeric',
        ]);

        $path = $request->file('image')->store('images/cars');
        $imageName = basename($path);
        $car = $request->all();
        $car['image'] = $imageName;
        // dd($car);
        

        Car::create($car);

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
        -> join('body_type', 'cars.body_type_id', '=', 'body_type.id')
        -> join('drive_system', 'cars.drive_system_id', '=', 'drive_system.id')
        -> join('engine_type', 'cars.engine_type_id', '=', 'engine_type.id')
        -> join('transmission_type', 'cars.transmission_type_id', '=', 'transmission_type.id')
        ->select('cars.id', 'brand_name', 'model', 'color_name', 'year', 'category_name', 'description', 'price', 'image', 'transmission_type', 'engine_type', 'drive_system', 'body_type', 'car_mileage')
        // ->select('*')
        ->where('cars.id', $car->id)
        ->first();

        // dd($car->id);

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
        $bodyTypes = BodyType::all();
        $driveSystems = DriveSystem::all();
        $engineTypes = EngineType::all();
        $transmissionTypes = TransmissionType::all();

        return  view('admin.cars.edit', 
                compact('car', 'brands', 'categories', 'colors', 'bodyTypes', 
                        'driveSystems', 'engineTypes', 'transmissionTypes'));
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
        // dd(isset($request['image']));
        // $request->validate([
        //     'brand_id' => 'required',
        //     'model' => 'required|string',
        //     'year' => 'required|integer',
        //     'description' => 'required|string',
        //     'price' => 'required|numeric',
        //     'image' => 'required',
        //     'category_id' => 'required',
        //     'color_id' => 'required',
        //     'body_type_id' => 'required',
        //     'drive_system_id' => 'required',
        //     'engine_type_id' => 'required',
        //     'transmission_type_id' => 'required',
        //     'car_mileage' => 'required|numeric',
        // ]);

        if(isset($request['image'])) {
            Storage::delete('images/cars/' . $car->image);
            $pathImage = $request->file('image')->store('images/cars');
            $imageName = basename($pathImage);
            $carRequest = $request->all();
            $carRequest['image'] = $imageName;
        } else {
            $carRequest = $request->all();
        }

    // dd($request['image']);
        $car->update($carRequest);

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

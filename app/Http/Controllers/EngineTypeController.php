<?php

namespace App\Http\Controllers;

use App\Models\EngineType;
use Illuminate\Http\Request;

class EngineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineTypes = EngineType::all();

        return view('admin.engineType.index', compact('engineTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'engine_type' => 'required|string',
        ]);

        EngineType::create($request->all());

        return redirect()->route('engineType.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EngineType  $engineType
     * @return \Illuminate\Http\Response
     */
    // public function show(EngineType $engineType)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EngineType  $engineType
     * @return \Illuminate\Http\Response
     */
    public function edit(EngineType $engineType)
    {
        return view('admin.engineType.edit', compact('engineType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EngineType  $engineType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EngineType $engineType)
    {
        $engineType->update($request->all());

        return redirect()->route('engineType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EngineType  $engineType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EngineType $engineType)
    {
        $engineType->delete();

        return redirect()->route('engineType.index');
    }
}

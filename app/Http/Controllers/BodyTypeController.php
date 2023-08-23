<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyTypes = BodyType::all();

        return view('admin.bodyType.index', compact('bodyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.bodyType.create');
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
            'body_type' => 'required|string',
        ]);

        BodyType::create($request->all());

        return redirect()->route('bodyType.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    // public function show(BodyType $bodyType)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    public function edit(BodyType $bodyType)
    {
        return view('admin.bodyType.edit', compact('bodyType'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodyType $bodyType)
    {
        $bodyType->update($request->all());

        return redirect()->route('bodyType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodyType  $bodyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BodyType $bodyType)
    {
        $bodyType->delete();

        return redirect()->route('bodyType.index');
    }
}

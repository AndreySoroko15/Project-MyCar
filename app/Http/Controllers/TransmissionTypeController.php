<?php

namespace App\Http\Controllers;

use App\Models\TransmissionType;
use Illuminate\Http\Request;

class TransmissionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transmissionTypes = TransmissionType::all();

        return view('admin.transmissionType.index', compact('transmissionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transmissionType.create');
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
            'transmission_type' => 'required|string',
        ]);

        TransmissionType::create($request->all());

        return redirect()->route('transmissionType.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransmissionType  $transmissionType
     * @return \Illuminate\Http\Response
     */
    // public function show(TransmissionType $transmissionType)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransmissionType  $transmissionType
     * @return \Illuminate\Http\Response
     */
    public function edit(TransmissionType $transmissionType)
    {
        return view('admin.transmissionType.edit', compact('transmissionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransmissionType  $transmissionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransmissionType $transmissionType)
    {
        $transmissionType->update($request->all());

        return redirect()->route('transmissionType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransmissionType  $transmissionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransmissionType $transmissionType)
    {
        $transmissionType->delete();

        return redirect()->route('transmissionType.index');
    }
}

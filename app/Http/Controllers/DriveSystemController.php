<?php

namespace App\Http\Controllers;

use App\Models\DriveSystem;
use Illuminate\Http\Request;

class DriveSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driveSystems = DriveSystem::all();

        return view('admin.driveSystem.index', compact('driveSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driveSystem.create');
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
            'drive_system' => 'required|string',
        ]);

        DriveSystem::create($request->all());

        return redirect()->route('driveSystem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriveSystem  $driveSystem
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriveSystem  $driveSystem
     * @return \Illuminate\Http\Response
     */
    public function edit(DriveSystem $driveSystem)
    {
        return view('admin.driveSystem.edit', compact('driveSystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DriveSystem  $driveSystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriveSystem $driveSystem)
    {
        $driveSystem->update($request->all());

        return redirect()->route('driveSystem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriveSystem  $driveSystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriveSystem $driveSystem)
    {
        $driveSystem->delete();

        return redirect()->route('driveSystem.index');
    }
}

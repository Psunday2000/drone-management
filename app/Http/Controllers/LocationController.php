<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::latest()->get();

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'name' => 'required|string|max:255',
    ]);

    $location = new Location();
    $location->latitude = $validatedData['latitude'];
    $location->longitude = $validatedData['longitude'];
    $location->name = $validatedData['name'];
    $location->save();

    return redirect()->route('locations.index')->with('success', 'New Location Alert');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $$location = Location::findorFail($id);

        return view('$locations.show', compact('$location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $$location = Location::findorFail($id);

        return view('$locations.edit', compact('$location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);
    
        $location = Location::findorFail($id);
        $location->latitude = $validatedData['latitude'];
        $location->longitude = $validatedData['longitude'];
        $location->name = $validatedData['name'];
        $location->save();
    
        return redirect()->route('locations.index')->with('success', 'Location Update Alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findorFail($id);

        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location Deleted');
    }
}

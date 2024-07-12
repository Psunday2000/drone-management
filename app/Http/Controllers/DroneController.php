<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Drone;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $drones = Drone::where('controller_id', $user->id)->simplePaginate(5);
        }
        
        $drones = Drone::latest()->simplePaginate(5);

        return view('drones.index', compact('drones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $controllers = User::where('role_id', 2)->get();

        return view('drones.create', [
            'controllers' => $controllers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'battery_level' => 'required|integer',
            'image' => 'required|image|max:400',
            'controller_id' => 'required|integer',
        ]);

        $fleetNo = 'CSDD-' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

        if ($request->hasFile('image')) {
            $imagePath = ImageHelper::upload($request->file('image'), 'images/drones');
        } else {
            $imagePath = null;
        }

        

        $drone = new Drone();
        $drone->name = $validateData['name'];
        $drone->controller_id = $validateData['controller_id'];
        $drone->fleet_no = $fleetNo;
        $drone->battery_level = $validateData['battery_level'];
        $drone->image = $imagePath;
        $drone->save();

        return redirect()->route('drones.index')->with('success', 'New Drone Alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::findorFail($id);
        
        return view('drones.show', compact('drone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drone = Drone::findorFail($id);
        $controllers = User::where('role_id', 2)->get();

        return view('drones.edit', [
            'controllers' => $controllers,
            'drone' => $drone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $drone = Drone::findOrFail($id);
        $drone->name = $validateData['name'];
        $drone->save();

        return redirect()->route('drones.index')->with('success', 'Drone Update Alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone = Drone::findorFail($id);

        $drone->delete();

        return redirect()->route('drones.index')->with('success', 'Drone Deleted');
    }

    public function newMission()
    {
        $controller = Auth::user();
        $drones = Drone::where('controller_id', $controller->id)->get();
        $categories = DisasterCategory::latest()->get();
        $locations = Location::latest()->get();

        return view('drones.mission', [
            'controller' => $controller,
            'drones' => $drones,
            'categories' => $categories,
            'locations' => $locations,
        ]);
    }
    
    public function recordMission(Request $request)
    {
        $validatedData = $request->validate([
            'drone_id' => 'required|integer',
            'category_id' => 'required|integer',
            'location_id' => 'required|integer',
            'description' => 'required|string|max:1024',
            'upload' => 'required|mimes:mp4,mov,ogg,qt|max:5120' // Ensure correct video MIME types and 5MB limit
        ]);

        $created_by = Auth::user()->id;

        if ($request->hasFile('upload')) {
            $videoPath = ImageHelper::upload($request->file('upload'), 'videos/disasters');
        } else {
            $videoPath = null;
        }

        $disaster = new Disaster();
        $disaster->created_by = $created_by;
        $disaster->drone_id = $validatedData['drone_id'];
        $disaster->category_id = $validatedData['category_id'];
        $disaster->location_id = $validatedData['location_id'];
        $disaster->description = $validatedData['description'];
        $disaster->upload = $videoPath;

        $disaster->save();

        $drone = Drone::findorFail($validatedData['drone_id']);
        $drone->battery_level = 100;
        $drone->save();

        return redirect()->route('drones.mission')->with('success', 'Mission Completed');
    }


}

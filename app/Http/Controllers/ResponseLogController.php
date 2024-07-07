<?php

namespace App\Http\Controllers;

use App\Models\Disaster;
use App\Models\Drone;
use App\Models\ResponseLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class ResponseLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_logs = ResponseLog::latest()->get();

        return view('response-logs.index', compact('response_logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $controller = Auth::user();
        $drones = Drone::where('controller_id', $controller);
        $disasters = Disaster::latest()->get();

        return view('response-logs.create', [
            'controller' => $controller,
            'drones' => $drones,
            'disasters' => $disasters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'controller_id' => 'required|integer',
            'description' => 'required|string',
            'drone_id' => 'required|integer',
            'disaster_id' => 'required|integer',
        ]);

        $response_log = new ResponseLog();
        $response_log->controller_id = $validateData['controller_id'];
        $response_log->description = $validateData['description'];
        $response_log->drone_id = $validateData['drone_id'];
        $response_log->disaster_id = $validateData['disaster_id'];
        $response_log->save();


        return redirect()->route('response-logs.index')->with('success', 'New Response Log Alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response_log = ResponseLog::findorFail($id);

        return view('response-logs.show', compact('response_log'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response_log = ResponseLog::findorFail($id);

        return view('response-logs.edit', compact('response_log'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'controller_id' => 'required|integer',
            'description' => 'required|string',
            'drone_id' => 'required|integer',
            'disaster_id' => 'required|integer',
        ]);

        $response_log = ResponseLog::findorFail($id);
        $response_log->controller_id = $validateData['controller_id'];
        $response_log->description = $validateData['description'];
        $response_log->drone_id = $validateData['drone_id'];
        $response_log->disaster_id = $validateData['disaster_id'];
        $response_log->save();


        return redirect()->route('response-logs.index')->with('success', 'Response Log Update Alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response_log = ResponseLog::findorFail($id);
        
        $response_log->delete();

        return redirect()->route('response-logs.index')->with('success', 'Response Log Deleted');
    }
}

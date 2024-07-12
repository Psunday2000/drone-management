<?php

namespace App\Http\Controllers;


use App\Models\Disaster;
use Illuminate\Support\Facades\Auth;

class DisasterController extends Controller
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
            $disasters = Disaster::where('created_by', $user->id)->simplePaginate(5);
        }
        $disasters = Disaster::latest()->simplePaginate(5);
        
        return view('disasters.index', compact('disasters'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disaster = Disaster::findorFail($id);

        return view('disasters.show', compact('disaster'));
    }
}

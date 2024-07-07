<?php

namespace App\Http\Controllers;

use App\Models\DisasterCategory;
use Illuminate\Http\Request;

class DisasterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disaster_categories = DisasterCategory::latest()->simplePaginate(5);

        return view('disaster-categories.index', compact('disaster_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disaster-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $disaster_category = new DisasterCategory();
        $disaster_category->name = $validateData['name'];
        $disaster_category->description = $validateData['description'];
        $disaster_category->save();

        return redirect()->route('disaster-categories.index')->with('success', 'New Disaster Category Alert');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $$disaster_category = DisasterCategory::findorFail($id);

        return view('$disaster-categories.show', compact('$disaster_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $$disaster_category = DisasterCategory::findorFail($id);

        return view('$disaster-categories.edit', compact('$disaster_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $disaster_category = DisasterCategory::findorFail($id);
        $disaster_category->name = $validateData['name'];
        $disaster_category->description = $validateData['description'];
        $disaster_category->save();

        return redirect()->route('disaster-categories.index')->with('success', 'Disaster Category Update Alert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disaster_category = DisasterCategory::findorFail($id);

        $disaster_category->delete();

        return redirect()->route('disaster-categories.index')->with('success', 'Disaster Category Deleted');
    }
}

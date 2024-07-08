<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Fetch all labs
    public function index()
    {
        $labs = Lab::all();
        return response()->json($labs);
    }

    // Create a new lab
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $lab = Lab::create($request->all());
        return response()->json($lab, 201);
    }

    // Show a specific lab
    public function show($id)
    {
        $lab = Lab::findOrFail($id);
        return response()->json($lab);
    }

    // Update a lab
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $lab = Lab::findOrFail($id);
        $lab->update($request->all());
        return response()->json($lab);
    }

    // Delete a lab
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $victims = Victim::latest()->paginate(10); // paginate for easier navigation
        return view('victims.index', compact('victims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('victims.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'id_number'     => 'nullable|string|max:50',
        'id_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        'phone'         => 'nullable|string|max:20',
        'address'       => 'nullable|string',
        'violence_type' => 'nullable|string|max:100',
        'other_details' => 'nullable|string',
    ]);

    // Handle image upload
    if ($request->hasFile('id_image')) {
        $image = $request->file('id_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('victims/id_images', $imageName, 'public');
        $validated['id_image'] = $imagePath;
    }

    // Save to DB
    Victim::create($validated);

    return redirect()->back()
                     ->with('success', 'Victim added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Victim $victim)
    {
        return view('victims.show', compact('victim'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Victim $victim)
    {
        return view('victims.edit', compact('victim'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Victim $victim)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'violence_type' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'other_details' => 'nullable|string',
    ]);

    $victim->update($validated);

    return redirect()->route('victims.index')
        ->with('success', 'Victim information updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Victim $victim)
    {
        $victim->delete();

        return redirect()->route('victims.index')
                         ->with('success', 'Victim deleted successfully.');
    }
}

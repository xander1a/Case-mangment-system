<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testimony::latest()->paginate(10);
        
        return view('testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'investigator'])) {
            abort(403, 'Unauthorized action.');
        }

        return view('testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'investigator'])) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'case_id' => 'required|string|max:255',
            'content' => 'required|string',
            'collected_at' => 'nullable|date',
        ]);

        Testimony::create($validated);

        return redirect()->route('testimonies.index')
            ->with('success', 'Testimony created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimony $testimony)
    {
        return view('testimonies.show', compact('testimony'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'investigator'])) {
            abort(403, 'Unauthorized action.');
        }

        return view('testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimony $testimony)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'investigator'])) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'case_id' => 'required|string|max:255',
            'content' => 'required|string',
            'collected_at' => 'nullable|date',
        ]);

        $testimony->update($validated);

        return redirect()->route('testimonies.index')
            ->with('success', 'Testimony updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimony $testimony)
    {
        // Check authorization - only admins can delete
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $testimony->delete();

        return redirect()->route('testimonies.index')
            ->with('success', 'Testimony deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Gbv_Support as GbvSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class GbvSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    // dd('here');
    $gbvSupport = GbvSupport::latest()->paginate(10); // Use plural in controller
    
    return view('GBV.index', compact('gbvSupport')); // Pass as 'gbvSupports'
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $user = Auth::user();

    $counselors = \App\Models\User::where('role', 'counselor')->get();
    $gbv_officers = \App\Models\User::where('role', 'gbv_officer')->get();

    // Only fetch cases assigned to the logged-in user as solver
    $cases = \App\Models\Casse::with('victim')
        ->where('solver', $user->id)
        ->get();

    return view('GBV.create', compact('counselors', 'cases', 'gbv_officers'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'gbv_officer'])) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'case_id' => 'required|string|max:255',
            'gbv_officer_id' => 'required|string|max:255',
            'provided_items' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        GbvSupport::create($validated);

        return redirect()->back()
            ->with('success', 'GBV support record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GbvSupport $gbvSupport)
{
    $gbvSupport->load(['case', 'officer']); 

    return view('GBV.show', compact('gbvSupport'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GbvSupport $gbvSupport)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'gbv_officer'])) {
            abort(403, 'Unauthorized action.');
        }

        // Additional check: GBV officers can only edit their own records
        if (auth()->user()->role === 'gbv_officer' && $gbvSupport->gbv_officer_id !== auth()->id()) {
            abort(403, 'You can only edit your own support records.');
        }

        return view('GBV.edit', compact('gbvSupport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GbvSupport $gbvSupport)
    {
        // Check authorization
        if (!in_array(auth()->user()->role, ['admin', 'gbv_officer'])) {
            abort(403, 'Unauthorized action.');
        }

        // Additional check: GBV officers can only update their own records
        if (auth()->user()->role === 'gbv_officer' && $gbvSupport->gbv_officer_id !== auth()->id()) {
            abort(403, 'You can only update your own support records.');
        }

        $validated = $request->validate([
            'case_id' => 'required|string|max:255',
            'gbv_officer_id' => 'required|string|max:255',
            'provided_items' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        $gbvSupport->update($validated);

        return redirect()->back()
            ->with('success', 'GBV support record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GbvSupport $gbvSupport)
    {
        // Check authorization - only admins can delete
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $gbvSupport->delete();

        return redirect()->back()
            ->with('success', 'GBV support record deleted successfully.');
    }
}
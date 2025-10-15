<?php

namespace App\Http\Controllers;

use App\Models\Psychological_Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychologicalSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $psychologicalSupports = Psychological_Support::latest()->paginate(10);
        
        return view('psychological.index', compact('psychologicalSupports'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $user = Auth::user();

    $counselors = \App\Models\User::where('role', 'counselor')->get();

    // Fetch only cases assigned to the logged-in user as solver
    $cases = \App\Models\Casse::with('victim')
        ->where('solver', $user->id)
        ->get();

    return view('psychological.create', compact('cases', 'counselors'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'case_id' => 'required|string|max:255',
            'counselor_id' => 'required|string|max:255',
            'details' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        Psychological_Support::create([
            'case_id' => $request->case_id,
            'counselor_id' => $request->counselor_id,
            'details' => $request->details,
            'supported_at' => $request->supported_at,
        ]);

        return redirect()->back()
            ->with('success', 'Psychological support record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Psychological_Support $psychologicalSupport)
    {
        return view('psychological.show', compact('psychologicalSupport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psychological_Support $psychologicalSupport)
    {
        return view('psychological.edit', compact('psychologicalSupport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Psychological_Support $psychologicalSupport)
    {
        $request->validate([
            'case_id' => 'required|string|max:255',
            'counselor_id' => 'required|string|max:255',
            'details' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        $psychologicalSupport->update([
            'case_id' => $request->case_id,
            'counselor_id' => $request->counselor_id,
            'details' => $request->details,
            'supported_at' => $request->supported_at,
        ]);

        return redirect()->back()
            ->with('success', 'Psychological support record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psychological_Support $psychologicalSupport)
    {
        $psychologicalSupport->delete();

        return redirect()->back()
            ->with('success', 'Psychological support record deleted successfully.');
    }
}
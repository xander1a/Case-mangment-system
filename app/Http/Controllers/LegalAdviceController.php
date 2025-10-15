<?php

namespace App\Http\Controllers;

use App\Models\Legal_Advice as LegalAdvice;
use Illuminate\Http\Request;
use App\Models\Casse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LegalAdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalAdvices = LegalAdvice::latest()->paginate(10);
        
        return view('legal.index', compact('legalAdvices'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $user = Auth::user();

    $counselors = User::where('role', 'counselor')->get();
    $legal_officers = User::where('role', 'legal_officer')->get();

    // Only get cases assigned to the logged-in user as solver
    $cases = Casse::with('victim')
        ->where('solver', $user->id)
        ->get();

    return view('legal.create', compact('cases', 'counselors', 'legal_officers'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'case_id' => 'required|string|max:255',
            'legal_officer_id' => 'required|string|max:255',
            'details' => 'required|string',
            'advised_at' => 'nullable|date',
        ]);

        LegalAdvice::create([
            'case_id' => $request->case_id,
            'legal_officer_id' => $request->legal_officer_id,
            'details' => $request->details,
            'advised_at' => $request->advised_at,
        ]);

        return redirect()->back()
            ->with('success', 'Legal advice record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LegalAdvice $legalAdvice)
    {
        return view('legal.show', compact('legalAdvice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LegalAdvice $legalAdvice)
    {
        return view('legal.edit', compact('legalAdvice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LegalAdvice $legalAdvice)
    {
        $request->validate([
            'case_id' => 'required|string|max:255',
            'legal_officer_id' => 'required|string|max:255',
            'details' => 'required|string',
            'advised_at' => 'nullable|date',
        ]);

        $legalAdvice->update([
            'case_id' => $request->case_id,
            'legal_officer_id' => $request->legal_officer_id,
            'details' => $request->details,
            'advised_at' => $request->advised_at,
        ]);

        return redirect()->back()
            ->with('success', 'Legal advice record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LegalAdvice $legalAdvice)
    {
        $legalAdvice->delete();

        return redirect()->back()
            ->with('success', 'Legal advice record deleted successfully.');
    }
}
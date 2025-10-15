<?php

namespace App\Http\Controllers;

use App\Models\Medical_treatment;
use Illuminate\Http\Request;
use App\Models\Victim;
use App\Models\Casse;

class MedicalTreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
$medicalTreatments = Medical_treatment::with(['case.victim'])->get();



    return view('medical-treatments.index', compact('medicalTreatments'));
}


    /**
     * Show the form for creating a new resource.
     */
 public function create()
{
    // Get all open cases assigned to the current user as solver
    $cases = Casse::where('status', 'open')
        ->where('solver', auth()->id())
        ->get();
    
    // Or if you want cases that are either open or in_progress
    // $cases = Casse::whereIn('status', ['open', 'in_progress'])
    //     ->where('solver', auth()->id())
    //     ->get();
    
    return view('medical-treatments.create', compact('cases'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'case_id' => 'required|exists:casses,id',
        'details' => 'required|string',
        'treated_at' => 'nullable|date',
    ]);
    
    Medical_treatment::create([
        'case_id' => $validated['case_id'],
        'doctor_id' => auth()->id(), // Assuming logged-in user is the doctor
        'details' => $validated['details'],
        'treated_at' => $validated['treated_at'] ?? now(),
    ]);
    
    return redirect()->route('medical-treatments.index')
        ->with('success', 'Medical treatment record created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Medical_treatment $medical_treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medical_treatment $medical_treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medical_treatment $medical_treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medical_treatment $medical_treatment)
    {
        //
    }
}

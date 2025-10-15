<?php

namespace App\Http\Controllers;

use App\Models\Social_Support as SocialSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialSupports = SocialSupport::latest()->paginate(10);
        
        return view('social.index', compact('socialSupports'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $user = Auth::user();

    $social_workers = \App\Models\User::where('role', 'social_worker')->get();

    // Fetch only cases assigned to the logged-in user as solver
    $cases = \App\Models\Casse::with('victim')
        ->where('solver', $user->id)
        ->get();

    return view('social.create', compact('social_workers', 'cases'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'case_id' => 'required|string|max:255',
            'social_worker_id' => 'required|string|max:255',
            'details' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        SocialSupport::create([
            'case_id' => $request->case_id,
            'social_worker_id' => $request->social_worker_id,
            'details' => $request->details,
            'supported_at' => $request->supported_at,
        ]);

        return redirect()->back()
            ->with('success', 'Social support record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialSupport $socialSupport)
    {
        return view('social.show', compact('socialSupport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialSupport $socialSupport)
    {
        return view('social.edit', compact('socialSupport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialSupport $socialSupport)
    {
        $request->validate([
            'case_id' => 'required|string|max:255',
            'social_worker_id' => 'required|string|max:255',
            'details' => 'required|string',
            'supported_at' => 'nullable|date',
        ]);

        $socialSupport->update([
            'case_id' => $request->case_id,
            'social_worker_id' => $request->social_worker_id,
            'details' => $request->details,
            'supported_at' => $request->supported_at,
        ]);

        return redirect()->back()
            ->with('success', 'Social support record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialSupport $socialSupport)
    {
        $socialSupport->delete();

        return redirect()->back()
            ->with('success', 'Social support record deleted successfully.');
    }
}
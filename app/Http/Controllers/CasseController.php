<?php

namespace App\Http\Controllers;

use App\Models\Casse;
use App\Models\Victim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Aimedidierm\FdiSms\SendSms;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\User;



class CasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $user = Auth::user();

    if ($user->role === 'admin') {
        // Admin sees all cases
        $cases = Casse::with(['victim', 'solverUser'])
            ->latest()
            ->paginate(10);
    } else {
        // Other users see only cases assigned to them as solver
        $cases = Casse::with(['victim', 'solverUser'])
            ->where('solver', $user->id)
            ->latest()
            ->paginate(10);
    }

    $victims = Victim::all();

    return view('cases.index', compact('cases', 'victims'));
}


    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $cases = Casse::with('victim')->latest()->paginate(10);
    $victims = Victim::all();
    $users   = User::all(); // all users available to assign as solver

    return view('cases.create', compact('victims', 'cases', 'users'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'victim_id' => 'required|exists:victims,id',
        'solver'    => 'nullable|exists:users,id',
        'status'    => 'nullable|in:open,in_progress,reports_submitted,closed',
    ]);

    Casse::create([
        'victim_id'      => $validated['victim_id'],
        'investigator_id'=> Auth::id(), // logged-in investigator
        'solver'         => $validated['solver'] ?? null,
        'status'         => $validated['status'] ?? 'in_progress',
        'opened_at'      => now(),
    ]);

    // Example SMS sending
    $to = "0783159293";
    $message = "Hello, you are called by " . Auth::user()->name;
    $this->sendSmsToUser($to, $message);

    return redirect()->route('cases.index')
        ->with('success', 'Case opened successfully.');
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    $casse = Casse::with('victim')->findOrFail($id);

    return view('cases.show', compact('casse'));
}


    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $casse = Casse::findOrFail($id);
    $victims = Victim::all(); 
    $users = User::all(); // fetch all users to allow selection as solver

    return view('cases.edit', compact('casse', 'victims', 'users'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'status'      => 'required|in:open,in_progress,closed',
        'victim_id'   => 'nullable|exists:victims,id',
        'solver'      => 'nullable|exists:users,id',
    ]);

    $casse = Casse::findOrFail($id);

    $casse->update([
        'title'       => $request->title,
        'description' => $request->description,
        'status'      => $request->status,
        'victim_id'   => $request->victim_id,
        'solver'      => $request->solver,
    ]);

    return redirect()->route('cases.show', $casse->id)
                     ->with('success', 'Case updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Casse $casse)
    {
        $casse->delete();

        return redirect()->route('cases.index')
                         ->with('success', 'Case deleted successfully.');
    }


     public function sendSmsToUser($to, $message)
{
    try {
        $senderId = "FDI";
        $ref = Str::random(40);
        $callbackUrl = "";

        // Send SMS
        $apiUsername = env("SMS_USERNAME");
        $apiPassword = env("SMS_PASSWORD");
        $smsSender = new SendSms($apiUsername, $apiPassword);

        $response = $smsSender->sendSms($to, $message, $senderId, $ref, $callbackUrl);

        // Optional: Log the SMS sending response
        Log::info('SMS Sent', [
            'to' => $to,
            'message' => $message,
            'response' => $response
        ]);

        return $response;
    } catch (\Exception $e) {
        // Log any errors that occur during SMS sending
        Log::error('SMS Sending Failed', [
            'to' => $to,
            'message' => $message,
            'error' => $e->getMessage()
        ]);

        return false;
    }
}
}

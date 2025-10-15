<?php

namespace App\Http\Controllers;

use App\Models\Casse as CaseModel; // Alias to avoid conflict with PHP reserved word 'case'
use App\Models\Victim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        

        if ($user->role === 'admin') {
            return $this->adminDashboard();
        }

        if ($user->role === 'investigator') {

            // dd($user);
            return $this->investigatorDashboard();
        }

        if ($user->role === 'doctor') {
            return $this->doctorDashboard();
        }

        if ($user->role === 'counselor') {
            return $this->counselorDashboard();
        }

        if ($user->role === 'legal_officer') {
            return $this->legalOfficerDashboard();
        }

        if ($user->role === 'gbv_officer') {
            return $this->gbvOfficerDashboard();
        }

        if ($user->role === 'social_worker') {
            return $this->socialWorkerDashboard();
        }

        return view('home', ['message' => 'Welcome! Please contact an admin to assign your role.']);
    }

    public function adminDashboard()
    {
        $data['cases'] = CaseModel::with('victim')->latest()->get();
        $data['victims'] = Victim::count();
        return view('home', $data);
    }

    public function investigatorDashboard()
    {
        $user = Auth::user();
        $data['open_cases'] = CaseModel::where('investigator_id', $user->id)
            ->where('status', 'open')
            ->with('victim')
            ->latest()
            ->get();
      $data['pending_testimonies'] = CaseModel::where('investigator_id', $user->id)
    ->whereDoesntHave('testimonies') // plural here
    ->with('victim')
    ->latest()
    ->get();


        return view('home', $data);
    }

    public function doctorDashboard()
    {
        $data['pending_treatments'] = CaseModel::whereDoesntHave('medicalTreatment')
            ->with('victim')
            ->latest()
            ->get();
        return view('home', $data);
    }

    public function counselorDashboard()
    {
        $data['pending_psych_support'] = CaseModel::whereDoesntHave('psychologicalSupport')
            ->with('victim')
            ->latest()
            ->get();
        return view('home', $data);
    }

    public function legalOfficerDashboard()
    {
        $data['pending_legal_advice'] = CaseModel::whereDoesntHave('legalAdvice')
            ->with('victim')
            ->latest()
            ->get();
        return view('home', $data);
    }

    public function gbvOfficerDashboard()
    {
        // dd(auth()->user());
        $data['pending_gbv_support'] = CaseModel::whereDoesntHave('gbvSupport')
            ->with('victim')
            ->latest()
            ->get();
        return view('home', $data);
    }

    public function socialWorkerDashboard()
    {
        $data['pending_social_support'] = CaseModel::whereDoesntHave('socialSupport')
            ->with('victim')
            ->latest()
            ->get();
        return view('home', $data);
    }
}

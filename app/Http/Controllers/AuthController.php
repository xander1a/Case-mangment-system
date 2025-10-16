<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        // dd('here');
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        
        if (Auth::attempt($credentials)) {

// dd( auth()->user()->role );


         if(auth()->user()->role == 'admin') {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        

          if(auth()->user()->role == 'doctor') {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

            if(auth()->user()->role == 'counselor') {
                $request->session()->regenerate();
                return redirect('dashboard');
            }
    
            if(auth()->user()->role == 'legal_officer') {
                $request->session()->regenerate();
                return redirect('dashboard');
            }
    
            if(auth()->user()->role == 'social_worker') {
                $request->session()->regenerate();
                return redirect('dashboard');
            }
    
            if(auth()->user()->role == 'gbv_officer') {
                $request->session()->regenerate();
                return redirect('dashboard');
            }

            if(auth()->user()->role == 'investigator') {
                $request->session()->regenerate();
                return redirect('dashboard');
            }
    
                $request->session()->regenerate();
                return redirect()->intended('home');


    }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

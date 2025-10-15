@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-slate-800 mb-2">User Details</h1>
                    <p class="text-lg text-slate-600">View complete user information</p>
                </div>
                <a href="{{ route('users.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-slate-600 hover:bg-slate-700 text-white font-semibold shadow-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
            </div>
        </div>

        <!-- User Profile Card -->
        <div class="bg-white shadow-2xl border-2 border-slate-200 overflow-hidden mb-6">
            <!-- Header with Actions -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-20 h-20 bg-white flex items-center justify-center text-blue-600 font-bold text-3xl shadow-lg">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="ml-6">
                            <h2 class="text-2xl font-bold text-white">{{ $user->name }}</h2>
                            <p class="text-blue-100 mt-1">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('users.edit', $user) }}" 
                           class="inline-flex items-center px-5 py-3 bg-white hover:bg-blue-50 text-blue-600 font-semibold shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit User
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-5 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete User
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- User Information -->
            <div class="p-8">
                <div class="border-2 border-slate-100 bg-slate-50/50">
                    <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                        <h3 class="text-lg font-bold text-slate-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1.5C14.5 1.1 13.7 1.1 13.2 1.5L7 7V9H9V16C9 17.1 9.9 18 11 18V22H13V18C14.1 18 15 17.1 15 16V9H21Z"/>
                            </svg>
                            Personal Information
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- User ID -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">User ID</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    <p class="text-slate-900 font-medium">#{{ $user->id }}</p>
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    <p class="text-slate-900 font-medium">{{ $user->name }}</p>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    <p class="text-slate-900 font-medium">{{ $user->email }}</p>
                                </div>
                            </div>

                            <!-- Role -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Role</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    <span class="px-4 py-2 inline-flex text-sm font-bold {{ $user->role_badge_color }}">
                                        {{ $user->role_name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Email Verified -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Verification</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    @if($user->email_verified_at)
                                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            Verified
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Not Verified
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Created At -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Account Created</label>
                                <div class="px-4 py-3 bg-white border-2 border-slate-200">
                                    <p class="text-slate-900 font-medium">{{ $user->created_at->format('F d, Y \a\t h:i A') }}</p>
                                    <p class="text-slate-500 text-sm mt-1">{{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Activity -->
        <div class="bg-white shadow-2xl border-2 border-slate-200 overflow-hidden">
            <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                <h3 class="text-lg font-bold text-slate-700 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.9L16.2,16.2Z"/>
                    </svg>
                    Account Activity
                </h3>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Last Updated -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-blue-100 p-3">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-bold text-slate-700">Last Updated</p>
                            <p class="text-slate-900 font-medium mt-1">{{ $user->updated_at->format('F d, Y \a\t h:i A') }}</p>
                            <p class="text-slate-500 text-sm mt-1">{{ $user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Account Status -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-green-100 p-3">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-bold text-slate-700">Account Status</p>
                            <p class="text-green-600 font-bold mt-1">Active</p>
                            <p class="text-slate-500 text-sm mt-1">User has full system access</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Description -->
        <div class="bg-white shadow-2xl border-2 border-slate-200 overflow-hidden mt-6">
            <div class="bg-slate-100 border-b-2 border-slate-200 px-6 py-4">
                <h3 class="text-lg font-bold text-slate-700 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z"/>
                    </svg>
                    Role Information
                </h3>
            </div>
            
            <div class="p-6">
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-bold text-blue-800">{{ $user->role_name }}</h4>
                            <p class="mt-2 text-sm text-blue-700">
                                @switch($user->role)
                                    @case('admin')
                                        Full system access with ability to manage all users, settings, and data. Can perform all administrative tasks.
                                        @break
                                    @case('investigator')
                                        Authorized to investigate cases, gather evidence, and document findings. Has access to case management tools.
                                        @break
                                    @case('doctor')
                                        Medical professional responsible for victim examinations and medical documentation. Access to health records.
                                        @break
                                    @case('counselor')
                                        Provides psychological support and counseling services. Access to counseling records and session management.
                                        @break
                                    @case('legal_officer')
                                        Handles legal aspects of cases, court proceedings, and legal documentation. Access to legal case files.
                                        @break
                                    @case('gbv_officer')
                                        Specialized in Gender-Based Violence cases. Manages GBV-specific protocols and victim support services.
                                        @break
                                    @case('social_worker')
                                        Provides social support services, coordinates with external agencies, and manages victim welfare programs.
                                        @break
                                    @default
                                        Standard user with limited access to system features.
                                @endswitch
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
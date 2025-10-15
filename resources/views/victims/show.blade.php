@extends('layouts.app')

@section('title', 'Victim Details')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-4">
    <!-- Header Card -->
    <div class="bg-blue-500  rounded-t-xl p-6 text-white shadow-lg">
        <div class="flex items-center space-x-3">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <div>
                <h2 class="text-3xl font-bold">Victim #{{ $victim->id }}</h2>
                <p class="text-indigo-100 text-sm">Complete victim information and case history</p>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-b-xl shadow-lg p-8">
        <!-- Personal Information Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-2 mb-4">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-900">Personal Information</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Name -->
                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-indigo-500">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-indigo-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Full Name</p>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $victim->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-green-500">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Phone Number</p>
                            <p class="text-base font-bold text-gray-900 mt-1">{{ $victim->phone }}</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-blue-500">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Email Address</p>
                            <p class="text-base font-bold {{ $victim->email ? 'text-gray-900' : 'text-gray-400 italic' }} mt-1">
                                {{ $victim->email ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-purple-500">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Address</p>
                            <p class="text-base font-bold {{ $victim->address ? 'text-gray-900' : 'text-gray-400 italic' }} mt-1">
                                {{ $victim->address ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Details -->
            <div class="mt-4 p-4 bg-gray-50 rounded-lg border-l-4 border-yellow-500">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Additional Details</p>
                        <p class="text-base {{ $victim->other_details ? 'text-gray-900' : 'text-gray-400 italic' }} mt-1">
                            {{ $victim->other_details ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Associated Cases Section -->
        <div class="border-t border-gray-200 pt-6">
            <div class="flex items-center space-x-2 mb-4">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-900">Associated Cases</h3>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-800">
                    {{ $victim->cases->count() }}
                </span>
            </div>

            @forelse ($victim->cases as $case)
                <div class="mb-3 p-5 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <span class="text-lg font-bold text-gray-900">Case #{{ $case->id }}</span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600">Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                        @if($case->status === 'open') bg-green-100 text-green-800 
                                        @elseif($case->status === 'in_progress') bg-yellow-100 text-yellow-800 
                                        @elseif($case->status === 'reports_submitted') bg-blue-100 text-blue-800 
                                        @else bg-gray-100 text-gray-800 
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $case->status)) }}
                                    </span>
                                </div>
                                
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600">Opened:</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $case->opened_at }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('cases.show', $case->id) }}" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            <span>View</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="p-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-gray-500 text-sm font-medium">No cases associated with this victim.</p>
                </div>
            @endforelse
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200 mt-6">
            <a href="{{ route('victims.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition-colors shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to List
            </a>
            
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('victims.edit', $victim->id) }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Victim
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
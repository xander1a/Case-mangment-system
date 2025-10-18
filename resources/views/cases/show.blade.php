@extends('layouts.app')

@section('title', 'Case Details')

@section('content')
<div class="max-w-4xl mx-auto mt-10 px-4">
    <!-- Header Card -->
    <div class="bg-blue-500 rounded-t-xl p-6 text-white shadow-lg">
        <div class="flex items-center space-x-3">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <div>
                <h2 class="text-3xl font-bold">Case #{{ $casse->id }}</h2>
                <p class="text-blue-100 text-sm">Complete case information and details</p>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-b-xl shadow-lg p-8">
        <!-- Victim Information -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-blue-500">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-blue-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <div class="flex-1">
                    <p class="text-sm text-gray-600 font-semibold uppercase tracking-wide">Victim</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $casse->victim->name }}</p>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-green-500">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-green-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1">
                    <p class="text-sm text-gray-600 font-semibold uppercase tracking-wide">Case Status</p>
                    <div class="mt-2">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                            @if($casse->status === 'open') bg-green-100 text-green-800 
                            @elseif($casse->status === 'in_progress') bg-yellow-100 text-yellow-800 
                            @elseif($casse->status === 'reports_submitted') bg-blue-100 text-blue-800 
                            @else bg-gray-100 text-gray-800 
                            @endif">
                            <span class="w-2 h-2 rounded-full mr-2
                                @if($casse->status === 'open') bg-green-500 
                                @elseif($casse->status === 'in_progress') bg-yellow-500 
                                @elseif($casse->status === 'reports_submitted') bg-blue-500 
                                @else bg-gray-500 
                                @endif"></span>
                            {{ ucfirst(str_replace('_', ' ', $casse->status)) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-purple-500">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-purple-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1">
                    <p class="text-sm text-gray-600 font-semibold uppercase tracking-wide mb-3">Timeline</p>
                    <div class="mb-3 flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 uppercase">Opened</p>
                            <p class="text-base font-semibold text-gray-900">{{ $casse->opened_at }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 {{ $casse->closed_at ? 'bg-gray-500' : 'bg-gray-300' }} rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 uppercase">Closed</p>
                            <p class="text-base font-semibold {{ $casse->closed_at ? 'text-gray-900' : 'text-gray-400 italic' }}">
                                {{ $casse->closed_at ?? 'Not closed yet' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">
            <a href="{{ route('cases.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition-colors shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Cases
            </a>
            
            @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'investigator' && $casse->investigator_id === auth()->id()))
                <a href="{{ route('cases.edit', $casse->id) }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414
                              a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Case
                </a>
            @endif
        </div>
    </div>
</div>

<!-- Doctor Form: Create Treatment Record -->
@if (auth()->user()->role === 'doctor')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Create Medical Treatment Record</h3>
                <form method="POST" action="{{ route('medical-treatments.store') }}">
                    @csrf

                    <input type="hidden" name="case_id" value="{{ $casse->id }}">

                    <!-- Treatment Details -->
                    <div class="mb-4">
                        <label for="details" class="block text-sm font-medium text-gray-700">
                            Treatment Details <span class="text-red-500">*</span>
                        </label>
                        <textarea name="details" id="details" rows="6"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                   focus:border-indigo-500 focus:ring-indigo-500"
                            required>{{ old('details') }}</textarea>
                        @error('details')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Treatment Date -->
                    <div class="mb-4">
                        <label for="treated_at" class="block text-sm font-medium text-gray-700">
                            Treatment Date & Time
                        </label>
                        <input type="datetime-local" name="treated_at" id="treated_at"
                            value="{{ old('treated_at', now()->format('Y-m-d\TH:i')) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                   focus:border-indigo-500 focus:ring-indigo-500">
                        @error('treated_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('medical-treatments.index') }}" 
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Treatment Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

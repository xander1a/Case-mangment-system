@extends('layouts.app')

@section('title', 'Medical Treatments List')

@section('content')
    <!-- Enhanced full-width container with gradient background and better spacing -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced header section with better typography and description -->
            <div class="bg-white shadow-lg mb-8 p-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-slate-900 mb-2">Medical Treatments</h1>
                        <p class="text-lg text-slate-600">Comprehensive medical treatment records and patient care documentation</p>
                    </div>
                    @if (auth()->user()->role === 'doctor' )
                        <div class="mt-4 sm:mt-0">
                            <a href="{{ route('cases.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold hover:bg-emerald-700 transition-colors duration-200 shadow-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                View Cases for Treatment
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Enhanced table container with full width and better styling -->
            <div class="bg-white shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-slate-200">
                        <!-- Enhanced table header with better colors and typography -->
                        <thead class="bg-slate-800">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">Case ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">Victim</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">Details</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">Treated At</th>
                                {{-- <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">Actions</th> --}}
                            </tr>
                        </thead>
                        <!-- Enhanced table body with hover effects and better spacing -->
                        <tbody class="bg-white divide-y divide-slate-200">
@php
    $count = 1;
@endphp
                           
                            @forelse ($medicalTreatments as $treatment)
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-slate-900">#{{ $count++ }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-slate-900">{{ $treatment->case->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-slate-900">{{ $treatment->case->victim->name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-700 max-w-xs">{{ Str::limit($treatment->details, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-slate-600">{{ $treatment->treated_at ?? 'N/A' }}</div>
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            {{-- <a href="{{ route('medical-treatments.show', $treatment->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 hover:bg-blue-200 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a> 
                                            @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'doctor'))
                                                <a href="{{ route('medical-treatments.edit', $treatment->id) }}" class="inline-flex items-center px-3 py-1 bg-amber-100 text-amber-700 hover:bg-amber-200 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                                <!-- Enhanced empty state with better styling -->
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-slate-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <h3 class="text-lg font-medium text-slate-900 mb-1">No medical treatments found</h3>
                                            <p class="text-slate-500">Medical treatment records will appear here once they are created.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- {{ $medicalTreatments->links() }} <!-- Pagination if implemented --> --}}
        </div>
    </div>
@endsection

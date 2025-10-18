@extends('layouts.app')

@section('title', 'Cases List')

@section('content')
    <!-- Enhanced header section with modern styling -->
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header Section -->
            <div class="bg-white shadow-lg mb-8">
                <div class="px-8 py-6 border-b border-slate-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900">Cases Management</h1>
                            <p class="mt-2 text-slate-600">Track and manage all investigation cases</p>
                        </div>
                        @if ( auth()->user()->role === 'investigator')
                            <!-- Enhanced button styling -->
                            <div class="mt-4 sm:mt-0">
                                <a href="{{ route('cases.create') }}"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors duration-200 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Open New Case
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Enhanced table container with modern styling -->
            <div class="bg-white shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <!-- Enhanced table header -->
                        <thead class="bg-slate-800">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Case ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Victim Name</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Solver Name</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Solver Email</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Opened Date</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-100 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>

                        <!-- Enhanced table body with hover effects -->
                        <tbody class="bg-white divide-y divide-slate-200">
                            @php
                               $count = 1;
                            @endphp
                            @forelse ($cases as $case)
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-slate-900">{{ $count++ }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-slate-200 flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="text-sm font-medium text-slate-900">{{ $case->victim->name }}</div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4">
                                        {{ $case->solverUser ? $case->solverUser->name : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $case->solverUser ? $case->solverUser->email : 'N/A' }}
                                    </td>
                                   

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Enhanced status badge -->
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-semibold 
                                            @if ($case->status === 'open') bg-green-100 text-green-800
                                            @elseif($case->status === 'closed') bg-red-100 text-red-800
                                            @elseif($case->status === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-slate-100 text-slate-800 @endif">
                                            {{ ucfirst($case->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-slate-900">{{ $case->opened_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <!-- Enhanced action buttons -->
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('cases.show', $case->id) }}"
                                                class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 hover:bg-blue-200 transition-colors duration-150">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                                View
                                            </a>
                                            @if ((auth()->user()->role === 'investigator'))
                                                <a href="{{ route('cases.edit', $case->id) }}"
                                                    class="inline-flex items-center px-3 py-1 bg-amber-100 text-amber-700 hover:bg-amber-200 transition-colors duration-150">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- Enhanced empty state -->
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-slate-400 mb-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <h3 class="text-lg font-medium text-slate-900 mb-2">No cases found</h3>
                                            <p class="text-slate-500">There are currently no cases in the system.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced pagination section -->
                @if ($cases->hasPages())
                    <div class="bg-slate-50 px-6 py-4 border-t border-slate-200">
                        {{ $cases->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

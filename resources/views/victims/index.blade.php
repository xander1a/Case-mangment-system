@extends('layouts.app')

@section('title', 'Victims List')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white rounded-xl shadow-lg mb-6 p-6 border border-blue-100">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl text-blue-900 font-bold mb-1">
                            Victims Database
                        </h1>
                        <p class="text-blue-600 text-sm">Manage and view victim records</p>
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <div class="mt-4 sm:mt-0">
                            <a href="{{ route('victims.create') }}" 
                               class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add New Victim
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-blue-100">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
                    <h3 class="text-base font-semibold text-blue-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        All Records
                    </h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead class="bg-gradient-to-r from-blue-500 to-blue-600">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    No
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    ID Image
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Full Name
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    ID Number
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Phone Number
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Violence Type
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Address
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
@php
    $count = 1;
@endphp
                           
                            @forelse ($victims as $victim)
                                <tr class="hover:bg-blue-50 transition-all duration-200 group">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center shadow-sm">
                                                <span class="text-xs font-bold text-blue-700">{{ $count++ }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if($victim->id_image)
                                            <div class="relative group/img">
                                                <img src="{{ asset('storage/' . $victim->id_image) }}" 
                                                     alt="ID Image" 
                                                     class="w-12 h-12 rounded-lg object-cover border-2 border-blue-200 shadow-sm cursor-pointer hover:shadow-md transition-all"
                                                     onclick="openImageModal('{{ asset('storage/' . $victim->id_image) }}')">
                                                <div class="absolute inset-0 bg-blue-900 bg-opacity-0 group-hover/img:bg-opacity-10 rounded-lg transition-all flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white opacity-0 group-hover/img:opacity-100 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        @else
                                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center border-2 border-gray-200">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-7 h-7 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mr-2">
                                                <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <div class="text-sm font-semibold text-blue-900">{{ $victim->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-xs text-blue-700 font-medium bg-blue-50 px-2 py-1 rounded inline-block">
                                            {{ $victim->id_number ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-3 h-3 text-blue-400 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            <div class="text-xs text-blue-700 font-medium">{{ $victim->phone ?? 'N/A' }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if($victim->violence_type)
                                            @php
                                                $colors = [
                                                    'sexual' => 'bg-red-100 text-red-700 border-red-200',
                                                    'emotional' => 'bg-purple-100 text-purple-700 border-purple-200',
                                                    'physical' => 'bg-orange-100 text-orange-700 border-orange-200',
                                                    'economic' => 'bg-yellow-100 text-yellow-700 border-yellow-200'
                                                ];
                                                $colorClass = $colors[$victim->violence_type] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium border {{ $colorClass }}">
                                                {{ ucfirst($victim->violence_type) }}
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-400">N/A</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-xs text-blue-700 max-w-xs truncate" title="{{ $victim->address }}">
                                            {{ $victim->address ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('victims.show', $victim->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 bg-green-50 text-green-700 hover:bg-green-100 rounded-lg transition-all duration-200 border border-green-200 text-xs font-semibold">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                            @if (auth()->user()->role === 'admin')
                                                <a href="{{ route('victims.edit', $victim->id) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg transition-all duration-200 border border-blue-200 text-xs font-semibold">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4 shadow-inner">
                                                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-semibold text-blue-900 mb-2">No victims found</h3>
                                            <p class="text-blue-600 text-sm">There are currently no victim records in the database.</p>
                                            @if (auth()->user()->role === 'admin')
                                                <a href="{{ route('victims.create') }}" 
                                                   class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Add First Victim
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4" onclick="closeImageModal()">
        <div class="relative max-w-4xl max-h-full" onclick="event.stopPropagation()">
            <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <img id="modalImage" src="" alt="ID Document" class="max-w-full max-h-screen rounded-lg shadow-2xl">
        </div>
    </div>

    <script>
        function openImageModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
@endsection
@extends('layouts.app')
@section('title', 'Legal Advice Records')
@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Legal Advice Records</h2>
            <div class="space-x-2">
                @if ( auth()->user()->role === 'legal_officer')
                    <a href="{{ route('legal-advices.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Advice</a>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($legalAdvices->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Legal Officer ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Advice Details</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Advised At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                       @php
                           $count = 1;
                       @endphp
                       
                        @foreach($legalAdvices as $advice)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $count }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $advice->case_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $advice->legal_officer_id }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="max-w-xs">
                                        {{ Str::limit($advice->details, 100) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $advice->advised_at ? $advice->advised_at->format('Y-m-d H:i') : 'Not set' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('legal-advices.show', $advice->id) }}" 
                                           class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 px-3 py-1 rounded">View</a>
                                        
                                        @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'legal_officer' && $advice->legal_officer_id === auth()->id()))
                                            <a href="{{ route('legal-advices.edit', $advice->id) }}" 
                                               class="text-blue-600 hover:text-blue-900 bg-blue-100 px-3 py-1 rounded">Edit</a>
                                            
                                            <form action="{{ route('legal-advices.destroy', $advice->id) }}" 
                                                  method="POST" 
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-900 bg-red-100 px-3 py-1 rounded">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $legalAdvices->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">No legal advice records found.</p>
                @if (auth()->user()->role === 'legal_officer')
                    <a href="{{ route('legal-advices.create') }}" 
                       class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Add First Advice Record
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection
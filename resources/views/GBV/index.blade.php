@extends('layouts.app')
@section('title', 'GBV Support Records')
@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">GBV Support Records</h2>
            <div class="space-x-2">
                @if (auth()->user()->role === 'gbv_officer')
                    <a href="{{ route('gbv-supports.create') }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Add New Support</a>
                @endif
            </div>
        </div>

        @if($gbvSupport->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Officer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supported At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items Provided</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($gbvSupport as $support)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $support->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $support->case_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $support->gbv_officer_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $support->supported_at ? $support->supported_at->format('Y-m-d H:i') : 'Not set' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="max-w-xs truncate">
                                        {{ Str::limit($support->provided_items, 50) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('gbv-supports.show', $support->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">View</a>
                                    
                                    @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'gbv_officer' && $support->gbv_officer_id === auth()->id()))
                                        <a href="{{ route('gbv-supports.edit', $support->id) }}" 
                                           class="text-blue-600 hover:text-blue-900">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $gbvSupport->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">No GBV support records found.</p>
                @if ( auth()->user()->role === 'gbv_officer')
                    <a href="{{ route('gbv-supports.create') }}" 
                       class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Add First Support Record
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection
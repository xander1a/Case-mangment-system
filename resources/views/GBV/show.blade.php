@extends('layouts.app')

@section('title', 'GBV Support Details')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">GBV Support Details</h2>
            <div class="space-x-2">
                <a href="{{ route('gbv-supports.index') }}" 
                   class="bg-gray-600 text-white p-2 rounded hover:bg-gray-700">
                   Back to List
                </a>

                @if (auth()->user()->role === 'admin' || 
                     (auth()->user()->role === 'gbv_officer' && $gbvSupport->gbv_officer_id === auth()->id()))
                    <a href="{{ route('gbv-supports.edit', $gbvSupport->id) }}" 
                       class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
                       Edit
                    </a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Support ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $gbvSupport->id }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Case:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    @if($gbvSupport->case)
                        Case #{{ $gbvSupport->case->id }} 
                        (Victim: {{ $gbvSupport->case->victim ? $gbvSupport->case->victim->name : $gbvSupport->case->victim_id }})
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">GBV Officer:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $gbvSupport->officer ? $gbvSupport->officer->name : 'N/A' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Supported At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $gbvSupport->supported_at ? $gbvSupport->supported_at->format('Y-m-d H:i:s') : 'Not set' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $gbvSupport->created_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $gbvSupport->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Items Provided:</label>
            <div class="bg-gray-50 p-4 rounded min-h-32 border">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $gbvSupport->provided_items }}</p>
            </div>
        </div>

        <div class="text-sm text-gray-500 border-t pt-4">
            <p>Support record created on {{ $gbvSupport->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@endsection

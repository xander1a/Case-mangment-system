@extends('layouts.app')

@section('title', 'Testimony Details')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Testimony Details</h2>
            <div class="space-x-2">
                <a href="{{ route('testimonies.index') }}" class="bg-gray-600 text-white p-2 rounded hover:bg-gray-700">Back to List</a>
                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'investigator')
                    <a href="{{ route('testimonies.edit', $testimony->id) }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Edit</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Testimony ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $testimony->id }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Case ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $testimony->case_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Collected At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $testimony->collected_at ? $testimony->collected_at->format('Y-m-d H:i:s') : 'Not set' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $testimony->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Testimony Content:</label>
            <div class="bg-gray-50 p-4 rounded min-h-40 border">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $testimony->content }}</p>
            </div>
        </div>

        <div class="text-sm text-gray-500 border-t pt-4">
            <p>Last updated: {{ $testimony->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@endsection
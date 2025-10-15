@extends('layouts.app')
@section('title', 'Social Support Details')
@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Social Support Details</h2>
            <div class="space-x-2">
                <a href="{{ route('social-supports.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
                @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'social_worker' && $socialSupport->social_worker_id === auth()->id()))
                    <a href="{{ route('social-supports.edit', $socialSupport->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Support ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $socialSupport->id }}</p>
            </div>
                        
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Case ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $socialSupport->case_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Social Worker ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $socialSupport->social_worker_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Supported At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $socialSupport->supported_at ? $socialSupport->supported_at->format('Y-m-d H:i:s') : 'Not set' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $socialSupport->created_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $socialSupport->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Social Support Details:</label>
            <div class="bg-gray-50 p-4 rounded min-h-32 border">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $socialSupport->details }}</p>
            </div>
        </div>

        <div class="text-sm text-gray-500 border-t pt-4">
            <p>Social support record created on {{ $socialSupport->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@endsection
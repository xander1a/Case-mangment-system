@extends('layouts.app')
@section('title', 'Psychological Support Details')
@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Psychological Support Details</h2>
            <div class="space-x-2">
                <a href="{{ route('psychological-supports.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
                @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'counselor' && $psychologicalSupport->counselor_id === auth()->id()))
                    <a href="{{ route('psychological-supports.edit', $psychologicalSupport->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Support ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $psychologicalSupport->id }}</p>
            </div>
                        
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Case ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $psychologicalSupport->case_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Counselor ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $psychologicalSupport->counselor_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Supported At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $psychologicalSupport->supported_at ? $psychologicalSupport->supported_at->format('Y-m-d H:i:s') : 'Not set' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $psychologicalSupport->created_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $psychologicalSupport->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Support Details:</label>
            <div class="bg-gray-50 p-4 rounded min-h-32 border">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $psychologicalSupport->details }}</p>
            </div>
        </div>

        <div class="text-sm text-gray-500 border-t pt-4">
            <p>Support record created on {{ $psychologicalSupport->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@endsection
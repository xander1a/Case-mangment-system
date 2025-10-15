@extends('layouts.app')
@section('title', 'Legal Advice Details')
@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Legal Advice Details</h2>
            <div class="space-x-2">
                <a href="{{ route('legal-advices.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
                @if (auth()->user()->role === 'admin' || (auth()->user()->role === 'legal_officer' && $legalAdvice->legal_officer_id === auth()->id()))
                    <a href="{{ route('legal-advices.edit', $legalAdvice->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Advice ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $legalAdvice->id }}</p>
            </div>
                        
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Case ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $legalAdvice->case_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Legal Officer ID:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $legalAdvice->legal_officer_id }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Advised At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">
                    {{ $legalAdvice->advised_at ? $legalAdvice->advised_at->format('Y-m-d H:i:s') : 'Not set' }}
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $legalAdvice->created_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated:</label>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $legalAdvice->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Legal Advice Details:</label>
            <div class="bg-gray-50 p-4 rounded min-h-32 border">
                <p class="text-gray-900 whitespace-pre-wrap">{{ $legalAdvice->details }}</p>
            </div>
        </div>

        <div class="text-sm text-gray-500 border-t pt-4">
            <p>Legal advice record created on {{ $legalAdvice->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
@endsection
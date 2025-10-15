@extends('layouts.app')
@section('title', 'Edit Psychological Support')
@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit Psychological Support</h2>
            <div class="space-x-2">
                <a href="{{ route('psychological-supports.show', $psychologicalSupport->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">View Details</a>
                <a href="{{ route('psychological-supports.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('psychological-supports.update', $psychologicalSupport->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="case_id" class="block text-sm font-medium text-gray-700 mb-2">Case ID *</label>
                    <input type="text" 
                           id="case_id" 
                           name="case_id" 
                           value="{{ old('case_id', $psychologicalSupport->case_id) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>

                <div>
                    <label for="counselor_id" class="block text-sm font-medium text-gray-700 mb-2">Counselor ID *</label>
                    <input type="text" 
                           id="counselor_id" 
                           name="counselor_id" 
                           value="{{ old('counselor_id', $psychologicalSupport->counselor_id) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           required>
                </div>

                <div class="md:col-span-2">
                    <label for="supported_at" class="block text-sm font-medium text-gray-700 mb-2">Support Date & Time</label>
                    <input type="datetime-local" 
                           id="supported_at" 
                           name="supported_at" 
                           value="{{ old('supported_at', $psychologicalSupport->supported_at ? $psychologicalSupport->supported_at->format('Y-m-d\TH:i') : '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div class="mb-6">
                <label for="details" class="block text-sm font-medium text-gray-700 mb-2">Support Details *</label>
                <textarea id="details" 
                          name="details" 
                          rows="6"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="Describe the psychological support provided..."
                          required>{{ old('details', $psychologicalSupport->details) }}</textarea>
            </div>

            <div class="bg-gray-50 p-4 rounded mb-6">
                <p class="text-sm text-gray-600">
                    <strong>Created:</strong> {{ $psychologicalSupport->created_at->format('Y-m-d H:i:s') }}<br>
                    <strong>Last Updated:</strong> {{ $psychologicalSupport->updated_at->format('Y-m-d H:i:s') }}
                </p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('psychological-supports.show', $psychologicalSupport->id) }}" 
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Support</button>
            </div>
        </form>
    </div>
@endsection
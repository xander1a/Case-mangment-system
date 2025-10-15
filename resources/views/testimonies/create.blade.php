@extends('layouts.app')

@section('title', 'Add New Testimony')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New Testimony</h2>
            <a href="{{ route('testimonies.index') }}" class="bg-gray-600 text-white p-2 rounded hover:bg-gray-700">Back to List</a>
        </div>

        <form action="{{ route('testimonies.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="case_id" class="block text-sm font-medium text-gray-700 mb-2">Case ID <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="case_id" 
                        id="case_id" 
                        value="{{ old('case_id') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('case_id') border-red-500 @enderror"
                        placeholder="Enter case ID"
                        required
                    >
                    @error('case_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="collected_at" class="block text-sm font-medium text-gray-700 mb-2">Collection Date & Time</label>
                    <input 
                        type="datetime-local" 
                        name="collected_at" 
                        id="collected_at" 
                        value="{{ old('collected_at') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('collected_at') border-red-500 @enderror"
                    >
                    @error('collected_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Testimony Content <span class="text-red-500">*</span></label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="8"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror"
                    placeholder="Enter detailed testimony content..."
                    required
                >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Provide detailed testimony information including witness statements, evidence descriptions, and relevant details.</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('testimonies.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Testimony</button>
            </div>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Edit GBV Support')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit GBV Support</h2>
            <div class="space-x-2">
                <a href="{{ route('gbv-supports.index') }}" class="bg-gray-600 text-white p-2 rounded hover:bg-gray-700">Back to List</a>
                <a href="{{ route('gbv-supports.show', $gbvSupport->id) }}" class="bg-green-600 text-white p-2 rounded hover:bg-green-700">View Details</a>
            </div>
        </div>

        <form action="{{ route('gbv-supports.update', $gbvSupport->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="case_id" class="block text-sm font-medium text-gray-700 mb-2">Case ID <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="case_id" 
                        id="case_id" 
                        value="{{ old('case_id', $gbvSupport->case_id) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('case_id') border-red-500 @enderror"
                        placeholder="Enter case ID"
                        required
                    >
                    @error('case_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gbv_officer_id" class="block text-sm font-medium text-gray-700 mb-2">GBV Officer ID <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="gbv_officer_id" 
                        id="gbv_officer_id" 
                        value="{{ old('gbv_officer_id', $gbvSupport->gbv_officer_id) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gbv_officer_id') border-red-500 @enderror"
                        placeholder="Enter GBV officer ID"
                        required
                    >
                    @error('gbv_officer_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="supported_at" class="block text-sm font-medium text-gray-700 mb-2">Support Date & Time</label>
                    <input 
                        type="datetime-local" 
                        name="supported_at" 
                        id="supported_at" 
                        value="{{ old('supported_at', $gbvSupport->supported_at ? $gbvSupport->supported_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('supported_at') border-red-500 @enderror"
                    >
                    @error('supported_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="provided_items" class="block text-sm font-medium text-gray-700 mb-2">Items Provided <span class="text-red-500">*</span></label>
                <textarea 
                    name="provided_items" 
                    id="provided_items" 
                    rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('provided_items') border-red-500 @enderror"
                    placeholder="List all items and support provided (e.g., food packages, clothing, medical supplies, counseling services, etc.)"
                    required
                >{{ old('provided_items', $gbvSupport->provided_items) }}</textarea>
                @error('provided_items')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Please provide detailed information about all items and services provided to the victim.</p>
            </div>

            <div class="bg-gray-50 p-4 rounded mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Record Information</h3>
                <p class="text-sm text-gray-600">Created: {{ $gbvSupport->created_at->format('Y-m-d H:i:s') }}</p>
                <p class="text-sm text-gray-600">Last Updated: {{ $gbvSupport->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('gbv-supports.show', $gbvSupport->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Support Record</button>
            </div>
        </form>
    </div>
@endsection
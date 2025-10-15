@extends('layouts.app')

@section('title', 'Add New GBV Support')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New GBV Support</h2>
            <a href="{{ route('gbv-supports.index') }}" class="bg-gray-600 text-white p-2 rounded hover:bg-gray-700">Back to List</a>
        </div>

        <form action="{{ route('gbv-supports.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
    <label for="case_id" class="block text-sm font-medium text-gray-700 mb-2">
        Case (Victim) <span class="text-red-500">*</span>
    </label>
    <select 
        name="case_id" 
        id="case_id" 
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('case_id') border-red-500 @enderror"
        required
    >
        <option value="">-- Select Case --</option>
        @foreach($cases as $case)
            <option value="{{ $case->id }}" {{ old('case_id') == $case->id ? 'selected' : '' }}>
                Case #{{ $case->id }} - {{ $case->victim->name ?? 'Unknown Victim' }}
            </option>
        @endforeach
    </select>
    @error('case_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="gbv_officer_id" class="block text-sm font-medium text-gray-700 mb-2">
        GBV Officer <span class="text-red-500">*</span>
    </label>
    <select 
        name="gbv_officer_id" 
        id="gbv_officer_id" 
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gbv_officer_id') border-red-500 @enderror"
        required
    >
        <option value="">-- Select GBV Officer --</option>
        @foreach($gbv_officers as $officer)
            <option value="{{ $officer->id }}" 
                {{ old('gbv_officer_id', auth()->user()->role === 'gbv_officer' ? auth()->id() : '') == $officer->id ? 'selected' : '' }}>
                {{ $officer->name }}
            </option>
        @endforeach
    </select>
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
                        value="{{ old('supported_at') }}"
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
                >{{ old('provided_items') }}</textarea>
                @error('provided_items')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Please provide detailed information about all items and services provided to the victim.</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('gbv-supports.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Support Record</button>
            </div>
        </form>
    </div>
@endsection
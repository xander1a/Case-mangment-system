@extends('layouts.app')
@section('title', 'Add Social Support')
@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New Social Support</h2>
            <a href="{{ route('social-supports.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
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

        <form action="{{ route('social-supports.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
    <label for="case_id" class="block text-sm font-medium text-gray-700 mb-2">Case (Victim) *</label>
    <select id="case_id" 
            name="case_id" 
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
        <option value="">-- Select Case --</option>
        @foreach($cases as $case)
            <option value="{{ $case->id }}" {{ old('case_id') == $case->id ? 'selected' : '' }}>
                Case #{{ $case->id }} - {{ $case->victim->name ?? 'Unknown Victim' }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label for="social_worker_id" class="block text-sm font-medium text-gray-700 mb-2">Social Worker *</label>
    <select id="social_worker_id" 
            name="social_worker_id" 
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required>
        <option value="">-- Select Social Worker --</option>
        @foreach($social_workers as $worker)
            <option value="{{ $worker->id }}" 
                {{ old('social_worker_id', auth()->user()->role === 'social_worker' ? auth()->id() : '') == $worker->id ? 'selected' : '' }}>
                {{ $worker->name }}
            </option>
        @endforeach
    </select>
</div>


                <div class="md:col-span-2">
                    <label for="supported_at" class="block text-sm font-medium text-gray-700 mb-2">Support Date & Time</label>
                    <input type="datetime-local" 
                           id="supported_at" 
                           name="supported_at" 
                           value="{{ old('supported_at') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <div class="mb-6">
                <label for="details" class="block text-sm font-medium text-gray-700 mb-2">Social Support Details *</label>
                <textarea id="details" 
                          name="details" 
                          rows="6"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="Describe the social support provided..."
                          required>{{ old('details') }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('social-supports.index') }}" 
                   class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Support</button>
            </div>
        </form>
    </div>
@endsection
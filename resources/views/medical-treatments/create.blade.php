@extends('layouts.app')

@section('title', 'Add Medical Treatment')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('medical-treatments.store') }}">
                        @csrf

                        <!-- Case Selection -->
                        <div class="mb-4">
                            <label for="case_id" class="block text-sm font-medium text-gray-700">
                                Select Case <span class="text-red-500">*</span>
                            </label>
                            <select name="case_id" id="case_id" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                                <option value="">-- Select a Case --</option>
                                @foreach($cases as $case)
                                    <option value="{{ $case->id }}" {{ old('case_id') == $case->id ? 'selected' : '' }}>
                                        {{ $case->name }} - Victim: {{ $case->victim_id }} ({{ ucfirst($case->status) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('case_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Treatment Details -->
                        <div class="mb-4">
                            <label for="details" class="block text-sm font-medium text-gray-700">
                                Treatment Details <span class="text-red-500">*</span>
                            </label>
                            <textarea name="details" id="details" rows="6"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>{{ old('details') }}</textarea>
                            @error('details')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Treatment Date -->
                        <div class="mb-4">
                            <label for="treated_at" class="block text-sm font-medium text-gray-700">
                                Treatment Date & Time
                            </label>
                            <input type="datetime-local" name="treated_at" id="treated_at"
                                value="{{ old('treated_at', now()->format('Y-m-d\TH:i')) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('treated_at')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('medical-treatments.index') }}" 
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Treatment Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
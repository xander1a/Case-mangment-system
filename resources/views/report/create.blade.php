@extends('layouts.app')

@section('title', 'Submit Report')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Submit Report for Case #{{ $case->id }}</h2>
        <form method="POST" action="{{ route('reports.store') }}">
            @csrf
            <input type="hidden" name="case_id" value="{{ $case->id }}">
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Report Type</label>
                <select name="type" id="type" class="mt-1 block w-full border rounded p-2 @error('type') border-red-500 @enderror" required>
                    <option value="medical" {{ old('type') == 'medical' ? 'selected' : '' }}>Medical</option>
                    <option value="psychological" {{ old('type') == 'psychological' ? 'selected' : '' }}>Psychological</option>
                    <option value="legal" {{ old('type') == 'legal' ? 'selected' : '' }}>Legal</option>
                    <option value="gbv" {{ old('type') == 'gbv' ? 'selected' : '' }}>GBV</option>
                    <option value="social" {{ old('type') == 'social' ? 'selected' : '' }}>Social</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Report Content</label>
                <textarea name="content" id="content" rows="5" class="mt-1 block w-full border rounded p-2 @error('content') border-red-500 @enderror" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>
@endsection
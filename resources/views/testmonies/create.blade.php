@extends('layouts.app')

@section('title', 'Add Testimony')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Add Testimony for Case #{{ $case->id }}</h2>
        <form method="POST" action="{{ route('testimonies.store') }}">
            @csrf
            <input type="hidden" name="case_id" value="{{ $case->id }}">
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Testimony</label>
                <textarea name="content" id="content" rows="5" class="mt-1 block w-full border rounded p-2 @error('content') border-red-500 @enderror" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Send Update')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Send Update for Case #{{ $case->id }}</h2>
        <form method="POST" action="{{ route('updates.store') }}">
            @csrf
            <input type="hidden" name="case_id" value="{{ $case->id }}">
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="5" class="mt-1 block w-full border rounded p-2 @error('message') border-red-500 @enderror" required></textarea>
            </div>
            <div class="mb-4">
                <label for="sent_via" class="block text-sm font-medium text-gray-700">Send Via</label>
                <select name="sent_via" id="sent_via" class="mt-1 block w-full border rounded p-2 @error('sent_via') border-red-500 @enderror" required>
                    <option value="sms" {{ old('sent_via') == 'sms' ? 'selected' : '' }}>SMS</option>
                    <option value="phone" {{ old('sent_via') == 'phone' ? 'selected' : '' }}>Phone</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Send</button>
        </form>
    </div>
@endsection
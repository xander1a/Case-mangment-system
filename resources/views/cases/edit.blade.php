@extends('layouts.app')

@section('title', 'Edit Case')

@section('content')
    <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Case</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cases.update', $casse->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" 
                       value="{{ old('title', $casse->title) }}"
                       class="w-full border-gray-300 rounded p-2">
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block font-semibold">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border-gray-300 rounded p-2">{{ old('description', $casse->description) }}</textarea>
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block font-semibold">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded p-2">
                    <option value="open" {{ old('status', $casse->status) == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ old('status', $casse->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="closed" {{ old('status', $casse->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            {{-- Victim --}}
            <div>
                <label for="victim_id" class="block font-semibold">Victim</label>
                <select name="victim_id" id="victim_id" class="w-full border-gray-300 rounded p-2">
                    <option value="">-- Select Victim --</option>
                    @foreach ($victims as $victim)
                        <option value="{{ $victim->id }}" {{ old('victim_id', $casse->victim_id) == $victim->id ? 'selected' : '' }}>
                            {{ $victim->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Solver --}}
           {{-- Solver --}}
<div>
    <label for="solver" class="block font-semibold">Solver</label>
    <select name="solver" id="solver" class="w-full border-gray-300 rounded p-2">
        <option value="">-- Select Solver --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('solver', $casse->solver) == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->role }})
            </option>
        @endforeach
    </select>
</div>


            <div class="flex justify-end space-x-2">
                <a href="{{ route('cases.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update Case
                </button>
            </div>
        </form>
    </div>
@endsection

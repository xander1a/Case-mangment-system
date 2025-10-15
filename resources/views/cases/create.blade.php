@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Open a New Case</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Case Form -->
    <form action="{{ route('cases.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Victim selection -->
        <div>
            <label for="victim_id" class="block text-sm font-medium text-gray-700 mb-1">Select Victim *</label>
            <select name="victim_id" id="victim_id" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Choose Victim --</option>
                @foreach($victims as $victim)
                    <option value="{{ $victim->id }}" {{ old('victim_id') == $victim->id ? 'selected' : '' }}>
                        {{ $victim->name }} ({{ $victim->phone }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Solver selection -->
        <div>
            <label for="solver" class="block text-sm font-medium text-gray-700 mb-1">Assign Solver</label>
            <select name="solver" id="solver" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Choose Solver --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('solver') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->role }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Case Status (default in_progress) -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Case Status *</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                <option value="in_progress" {{ old('status', 'in_progress') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="reports_submitted" {{ old('status') == 'reports_submitted' ? 'selected' : '' }}>Reports Submitted</option>
                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Open Case
            </button>
        </div>
    </form>
</div>

<!-- Cases List -->
<div class="max-w-4xl mx-auto mt-8">
    <h3 class="text-lg font-semibold mb-3">Existing Cases</h3>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Victim</th>
                <th class="border p-2">Solver</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Opened At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cases as $case)
                <tr>
                    <td class="border p-2">{{ $case->id }}</td>
                    <td class="border p-2">{{ $case->victim->name ?? 'N/A' }}</td>
                    <td class="border p-2">{{ $case->solver ? \App\Models\User::find($case->solver)->name : 'N/A' }}</td>
                    <td class="border p-2">{{ ucfirst(str_replace('_',' ',$case->status)) }}</td>
                    <td class="border p-2">{{ $case->opened_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $cases->links() }}
    </div>
</div>
@endsection

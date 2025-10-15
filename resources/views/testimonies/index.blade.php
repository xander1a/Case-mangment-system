@extends('layouts.app')

@section('title', 'Testimonies List')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Testimonies</h2>
        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'investigator')
            <a href="{{ route('testimonies.create') }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700 mb-4 inline-block">Add New Testimony</a>
        @endif
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Case ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content Preview</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Collected At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($testimonies as $testimony)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $testimony->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $testimony->case_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($testimony->content, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $testimony->collected_at ? $testimony->collected_at->format('Y-m-d H:i') : 'Not set' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('testimonies.show', $testimony->id) }}" class="text-blue-600 hover:underline">View</a>
                                @if (auth()->user()->role === 'admin' || auth()->user()->role === 'investigator')
                                    <a href="{{ route('testimonies.edit', $testimony->id) }}" class="text-blue-600 hover:underline ml-2">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">No testimonies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $testimonies->links() }} <!-- Pagination if implemented -->
    </div>
@endsection
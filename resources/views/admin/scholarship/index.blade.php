@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Scholarships</h1>
        <a href="{{ route('scholarship.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Scholarship</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($items as $it)
            <div class="bg-white p-4 rounded shadow">
                <img src="{{ $it->picture ? asset('storage/' . $it->picture) : asset('img/home/scholarships/default.png') }}" class="w-full h-48 object-cover rounded mb-3">
                <h3 class="font-semibold">{{ $it->title }}</h3>
                <p class="text-sm text-gray-600">{{ Str::limit($it->description, 120) }}</p>
                <p class="text-xs text-gray-500 mt-2">By {{ $it->organizer }}</p>

                <div class="flex gap-2 mt-3">
                    <a href="{{ route('scholarship.edit', $it->id) }}" class="px-3 py-1 bg-yellow-400 rounded">Edit</a>

                    <form action="{{ route('scholarship.destroy', $it->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No scholarships yet.</p>
        @endforelse
    </div>
@endsection

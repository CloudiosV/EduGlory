@extends('admin.layout')

@section('content')
    <h1 class="text-2xl mb-4">Edit Competition</h1>

    <form action="{{ route('competition.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm">Current Picture</label>
            <img src="{{ $item->picture ? asset('storage/' . $item->picture) : asset('img/home/contest/default.png') }}" class="w-48 h-32 object-cover rounded mb-2">
        </div>

        <div>
            <label class="block text-sm">Replace Picture</label>
            <input type="file" name="picture" accept="image/*">
            @error('picture') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Title</label>
            <input type="text" name="title" class="w-full border p-2" value="{{ old('title', $item->title) }}">
            @error('title') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Organizer</label>
            <input type="text" name="organizer" class="w-full border p-2" value="{{ old('organizer', $item->organizer) }}">
        </div>

        <div>
            <label class="block text-sm">Registration Link</label>
            <input type="url" name="registration_link" class="w-full border p-2" value="{{ old('registration_link', $item->registration_link) }}">
        </div>

        <div>
            <label class="block text-sm">Description</label>
            <textarea name="description" rows="6" class="w-full border p-2">{{ old('description', $item->description) }}</textarea>
            @error('description') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('competition.index') }}" class="ml-2">Cancel</a>
        </div>
    </form>
@endsection

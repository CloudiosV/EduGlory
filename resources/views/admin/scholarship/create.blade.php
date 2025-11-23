@extends('admin.layout')

@section('content')
    <h1 class="text-2xl mb-4">Add Scholarship</h1>

    <form action="{{ route('scholarship.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
        @csrf

        <div>
            <label class="block text-sm">Picture</label>
            <input type="file" name="picture" accept="image/*">
            @error('picture') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Title</label>
            <input type="text" name="title" class="w-full border p-2" value="{{ old('title') }}">
            @error('title') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Organizer</label>
            <input type="text" name="organizer" class="w-full border p-2" value="{{ old('organizer') }}">
            @error('organizer') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Deadline</label>
            <input type="date" name="deadline" class="w-full border p-2" value="{{ old('deadline') }}">
            @error('deadline') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm">Registration Link</label>
            <input type="url" name="registration_link" class="w-full border p-2" value="{{ old('registration_link') }}">
        </div>

        <div>
            <label class="block text-sm">Description</label>
            <textarea name="description" rows="6" class="w-full border p-2">{{ old('description') }}</textarea>
            @error('description') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
            <a href="{{ route('scholarship.index') }}" class="ml-2">Cancel</a>
        </div>
    </form>
@endsection

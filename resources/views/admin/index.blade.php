@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-blue-400 p-4 rounded-lg shadow">
            <h2 class="font-bold text-lg mb-2">Most View</h2>
            @forelse ($mostView as $item)
                <p>{{ $loop->iteration }}. {{ $item->title }} ({{ $item->view_count }} views)</p>
            @empty
                <p class="text-sm text-gray-700">No data yet</p>
            @endforelse
        </div>

        <div class="bg-lime-200 p-4 rounded-lg shadow">
            <h2 class="font-bold text-lg mb-2">Most Apply</h2>
            @forelse ($mostApply as $item)
                <p>{{ $loop->iteration }}. {{ $item->title }} ({{ $item->apply_count }} applies)</p>
            @empty
                <p class="text-sm text-gray-700">No data yet</p>
            @endforelse
        </div>

        <div class="bg-yellow-300 p-4 rounded-lg shadow">
            <h2 class="font-bold text-lg mb-2">Least View & Apply</h2>
            @forelse ($leastViewApply as $item)
                <p>{{ $loop->iteration }}. {{ $item->title }}</p>
            @empty
                <p class="text-sm text-gray-700">No data yet</p>
            @endforelse
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-3">Database Users</h2>
    <div class="bg-white rounded-xl shadow p-4">
        <table class="w-full text-left">
            <thead>
                <tr><th class="p-2">Nama</th><th class="p-2">Email</th><th class="p-2">Role</th></tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr class="border-t"><td class="p-2">{{ $u->name }}</td><td class="p-2">{{ $u->email }}</td><td class="p-2">{{ $u->role }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

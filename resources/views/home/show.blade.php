@php
$isNotified = Auth::user()->notifications()
    ->where('data->item_id', $item->id)
    ->exists();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $item->title }} - EduGlory</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

  <!-- Header -->
  <header class="bg-sky-200 flex items-center justify-between px-6 py-3 shadow-md">
    <div class="flex items-center gap-3">
      <img src="{{ asset('img/edu_glory.png') }}" class="w-10 h-10 rounded-full">
      <input type="text" placeholder="Search" class="px-4 py-2 rounded-full bg-white w-60 md:w-96">
    </div>
    <img src="{{ asset('img/profile.jpg') }}" class="w-10 h-10 rounded-full border-2 border-white">
  </header>

  <!-- Main Content -->
  <main class="flex-grow max-w-6xl mx-auto p-6">

    <a href="{{ session('return_url', route('home')) }}" class="text-gray-700 hover:underline mb-4 block">
      ← Back
    </a>

    @if (session('status'))
      <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('status') }}
      </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">{{ strtoupper($item->title) }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      @php
        $folder = $item->category_id == 2 ? 'contest' : 'scholarships';
        $type   = $item->category_id == 2 ? 'contest' : 'scholarship';

        $isBookmarked = \App\Models\Bookmark::where('user_id', auth()->id())
            ->where('item_id', $item->id)
            ->where('tipe', $type)
            ->exists();
      @endphp

      <!-- IMAGE & ICONS -->
      <div>
        <img src="{{ asset('storage/' . $item->picture) }}" 
          class="rounded-lg shadow-md w-full mb-4">

        <!-- Bookmark + Notification -->
        <div class="flex items-center gap-6 mb-4">

          <!-- BOOKMARK BUTTON -->
          <form action="{{ route('bookmark.toggle', ['id' => $item->id, 'tipe' => $type]) }}" method="POST">
            @csrf
            <button type="submit" class="hover:scale-110 transition">
              @if($isBookmarked)
                <img src="{{ asset('img/home/icon/heart_fill.png') }}" class="w-6 h-6">
              @else
                <img src="{{ asset('img/home/icon/heart.png') }}" class="w-6 h-6">
              @endif
            </button>
          </form>

          <!-- NOTIFICATION BUTTON -->
          <form action="{{ route('notifications.toggle', $item->id) }}" method="POST">
            @csrf
            <button type="submit" class="hover:scale-110 transition">
              @if($isNotified)
                <img src="{{ asset('img/home/icon/notification_fill.png') }}" class="w-6 h-6">
              @else
                <img src="{{ asset('img/home/icon/notification.png') }}" class="w-6 h-6">
              @endif
            </button>
          </form>

        </div>

        <!-- INFO -->
        <p><strong>Alamat:</strong> {{ $item->address ?? '-' }}</p>

        <p>
          <strong>Link Regis:</strong>
          <a href="{{ $item->registration_link }}" target="_blank" class="text-blue-600 underline">
            {{ $item->registration_link }}
          </a>
        </p>
      </div>

      <!-- DESCRIPTION -->
      <div>
        <p class="text-gray-700 text-sm leading-relaxed text-justify">
          {{ $item->description }}
        </p>
      </div>
    </div>
  </main>

  <footer class="bg-gray-200 text-center py-4 text-sm text-gray-700 mt-auto">
    © 2025 EduGlory — Inspiring Young Achievers
  </footer>

</body>
</html>

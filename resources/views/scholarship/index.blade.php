<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduGlory - Scholarships</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex">

  <!-- Sidebar -->
  <aside class="fixed left-0 top-0 h-screen w-20 bg-sky-200 flex flex-col items-center py-6 space-y-8 shadow-md">
    <img src="{{ asset('img/edu_glory.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
    <nav class="flex flex-col space-y-8 text-2xl text-gray-700">
      <a href="{{ route('home') }}" class="hover:text-blue-600"><i class="fas fa-home"></i></a>
      <a href="{{ route('home') }}" class="hover:text-blue-600"><img src="{{ asset('img/home.png') }}" class="w-10 h-10"><i class="fas fa-graduation-cap"></i></a>
      <a href="{{ route('scholarships') }}" class="hover:text-blue-600"><img src="{{ asset('img/scholarship.png') }}" class="w-10 h-10"><i class="fas fa-heart"></i></a>
      <a href="{{ route('contests') }}" class="hover:text-blue-600"><img src="{{ asset('img/trophy.png') }}" class="w-10 h-10"><i class="fas fa-bell"></i></a>
      <a href="{{ route('notifications') }}" class="hover:text-blue-600"><img src="{{ asset('img/notification.png') }}" class="w-10 h-10"><i class="fas fa-trophy"></i></a>
      <a href="{{ route('bookmarks') }}" class="hover:text-blue-600"><img src="{{ asset('img/heart.png') }}" class="w-10 h-10"><i class="fas fa-trophy"></i></a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 ml-20">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-sky-200 flex items-center justify-between px-6 py-3 shadow-md">
      <div class="flex items-center gap-3">
        <input type="text" placeholder="Search" class="w-64 px-4 py-2 rounded-full focus:outline-none">
      </div>
      <img src="{{ asset('img/profile.jpg') }}" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
    </header>

    <!-- Content -->
    <main class="p-6">
      <h1 class="text-2xl font-bold mb-6">Scholarship</h1>

      <!-- Scholarship Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($scholarships as $scholarship)
          <a href="{{ route('home.show', $scholarship->id) }}" 
             class="bg-white rounded-lg shadow-md p-3 block hover:scale-[1.02] transition">
            <img src="{{ asset('storage/' . $scholarship->picture) }}" 
                 alt="{{ $scholarship->title }}" class="rounded-md mb-2 w-full h-64 object-cover">
            <h3 class="font-semibold">{{ $scholarship->title }}</h3>
            <p class="text-sm text-gray-600">{{ Str::limit($scholarship->description, 80) }}</p>
            <p class="text-xs text-gray-500 mt-2">By {{ $scholarship->organizer }}</p>
          </a>
        @empty
          <p class="text-gray-500">No scholarships found.</p>
        @endforelse
      </div>

      <!-- Pagination -->
      <div class="mt-8 flex justify-center">
        {{ $scholarships->links() }}
      </div>
    </main>
  </div>

  <script src="https://kit.fontawesome.com/a2e0e9f6d2.js" crossorigin="anonymous"></script>
</body>
</html>

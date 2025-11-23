<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduGlory - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex">

  <!-- Sidebar -->
  <aside class="fixed left-0 top-0 h-screen w-20 bg-sky-200 flex flex-col items-center py-6 space-y-8 shadow-md">
    <img src="{{ asset('img/edu_glory.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
    <nav class="flex flex-col space-y-8 text-2xl text-gray-700">
      <a href="{{ route('home') }}" class="hover:text-blue-600"><i class="fas fa-home"></i></a>
      <a href="{{ route('home') }}" class="hover:text-blue-600"><img src="{{ asset('img/home.png') }}" class="w-10 h-10"></a>
      <a href="{{ route('scholarships') }}" class="hover:text-blue-600"><img src="{{ asset('img/scholarship.png') }}" class="w-10 h-10"></a>
      <a href="{{ route('contests') }}" class="hover:text-blue-600"><img src="{{ asset('img/trophy.png') }}" class="w-10 h-10"></a>
      <a href="{{ route('notifications') }}" class="hover:text-blue-600"><img src="{{ asset('img/notification.png') }}" class="w-10 h-10"></a>
      <a href="{{ route('bookmarks') }}" class="hover:text-blue-600"><img src="{{ asset('img/heart.png') }}" class="w-10 h-10"></a>
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

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm text-red-500 hover:underline mb-3">Logout</button>
      </form>

      <!-- Greeting -->
      <div>
        <h1 class="text-2xl font-bold">Hey there, {{ Auth::user()->name }}</h1>
        <p class="text-sm text-gray-600">Ready to compete, learn, and achieve more?</p>
      </div>

      <!-- Banner Slideshow -->
      @if ($banners->isNotEmpty())
      <div class="mt-6 w-full rounded-lg overflow-hidden shadow-md relative">
          <div id="bannerSlider" class="w-full h-[600px] relative">
              
              @foreach ($banners as $index => $banner)
              <img 
                src="{{ asset('img/home/banner/' . $banner) }}"
                class="slide w-full h-[600px] object-cover absolute top-0 left-0 transition-opacity duration-700
                {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
              @endforeach

          </div>
      </div>
      <script>
          let currentSlide = 0;
          const slides = document.querySelectorAll('#bannerSlider .slide');
          const totalSlides = slides.length;

          function showSlide(index) {
              slides.forEach((slide, i) => {
                  slide.classList.remove("opacity-100", "z-10");
                  slide.classList.add("opacity-0", "z-0");
              });
              slides[index].classList.add("opacity-100", "z-10");
          }

          setInterval(() => {
              currentSlide = (currentSlide + 1) % totalSlides;
              showSlide(currentSlide);
          }, 3000);
      </script>
      @endif
      <!-- Competition Section -->
      <section class="mt-10">
        <div class="flex flex-wrap justify-between">
          <h2 class="text-xl font-bold mb-4">Competition</h2>
          <a href="{{ route('contests') }}" class="text-blue-600 hover:underline">See More</a>
        </div>
        <div class="flex flex-wrap gap-4">
          @forelse ($contests as $contest)
            <a href="{{ route('home.show', $contest->id) }}" 
              class="bg-white rounded-lg shadow-md p-3 block hover:scale-[1.02] transition w-[240px]">
              <img src="{{ asset('storage/' . $contest->picture) }}" class="rounded-md mb-2 w-full h-64 object-cover">
              <h3 class="font-semibold">{{ $contest->title }}</h3>
              <p class="text-sm text-gray-600">{{ Str::limit($contest->description, 80) }}</p>
              <p class="text-xs text-gray-500 mt-2">By {{ $contest->organizer }}</p>
            </a>
          @empty
            <p class="text-gray-500 text-sm">No contests available.</p>
          @endforelse
        </div>
      </section>

      <!-- Scholarship Section -->
      <section class="mt-10">
        <div class="flex flex-wrap justify-between">
          <h2 class="text-xl font-bold mb-4">Scholarships</h2>
          <a href="{{ route('scholarships') }}" class="text-blue-600 hover:underline">See More</a>
        </div>
        <div class="flex flex-wrap gap-4">
          @forelse ($scholarships as $scholarship)
            <a href="{{ route('home.show', $scholarship->id) }}" 
              class="bg-white rounded-lg shadow-md p-3 block hover:scale-[1.02] transition w-[240px]">
              <img src="{{ asset('storage/' . $scholarship->picture) }}" class="rounded-md mb-2 w-full h-64 object-cover">
              <h3 class="font-semibold">{{ $scholarship->title }}</h3>
              <p class="text-sm text-gray-600">{{ Str::limit($scholarship->description, 80) }}</p>
              <p class="text-xs text-gray-500 mt-2">By {{ $scholarship->organizer }}</p>
            </a>
          @empty
            <p class="text-gray-500 text-sm">No scholarships available.</p>
          @endforelse
        </div>
      </section>

    </main>
  </div>

  <script src="https://kit.fontawesome.com/a2e0e9f6d2.js" crossorigin="anonymous"></script>

</body>
</html>

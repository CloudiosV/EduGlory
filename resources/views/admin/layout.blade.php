<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin - EduGlory</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#B3DDFF] min-h-screen flex">
  <aside class="fixed left-0 top-0 h-screen w-20 bg-sky-200 flex flex-col items-center py-6 space-y-8 shadow-md">
    <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('img/edu_glory.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
    </a>
    <nav class="flex flex-col space-y-8 text-2xl text-gray-700">
      <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/home.png') }}" class="w-8 h-8"></a>
      <a href="{{ route('scholarship.index') }}"><img src="{{ asset('img/scholarship.png') }}" class="w-8 h-8"></a>
      <a href="{{ route('competition.index') }}"><img src="{{ asset('img/trophy.png') }}" class="w-8 h-8"></a>
    </nav>
  </aside>

  <div class="flex-1 p-8 ml-20">
    <div class="flex justify-between items-center mb-6">
      <input type="text" placeholder="Search" class="w-2/3 px-4 py-2 rounded-full shadow">
      <img src="{{ asset('img/profile.jpg') }}" class="w-12 h-12 rounded-full border-2 border-white">
    </div>

    @if(session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </div>
</body>
</html>

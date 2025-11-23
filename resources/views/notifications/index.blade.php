<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications - EduGlory</title>
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

  <!-- MAIN -->
  <div class="flex-1 ml-20">

    <!-- HEADER -->
    <header class="bg-sky-200 flex items-center justify-between px-6 py-3 shadow-md">
      <input type="text" placeholder="Search" class="px-4 py-2 rounded-full w-60 md:w-96">
      <img src="{{ asset('img/profile.jpg') }}" class="w-10 h-10 rounded-full">
    </header>

    <main class="p-6">
      <h1 class="text-2xl font-bold mb-6">Notification</h1>

      @forelse ($notifications as $notif)
        <div class="bg-white shadow-md border rounded-lg p-4 mb-4 flex items-center justify-between">

          <!-- LEFT CONTENT -->
          <div class="flex items-center gap-4">

            <img src="{{ asset('storage/' . $notif->data['image']) }}"
              class="w-20 h-20 rounded-md object-cover">

            <div>
              <h2 class="text-lg font-semibold">{{ $notif->data['title'] }}</h2>
              <p class="text-gray-600 text-sm">{{ $notif->data['message'] }}</p>
            </div>

          </div>

          <!-- RIGHT ACTIONS -->
          <div class="flex items-center gap-4">

            <!-- Bookmark (POST) -->
            <form action="{{ route('bookmark.toggle', ['id' => $notif->data['item_id'], 'tipe' => $notif->data['category_id'] == 1 ? 'scholarship' : 'contest']) }}"
                  method="POST">
              @csrf
              <button>
                <img src="{{ asset('img/home/icon/heart.png') }}" class="w-6 h-6">
              </button>
            </form>

            <!-- Mark as Read -->
            @if(!$notif->read_at)
            <form action="{{ route('notifications.read', $notif->id) }}" method="POST">
              @csrf
              <button>
                <img src="{{ asset('img/home/icon/notification.png') }}" class="w-6 h-6">
              </button>
            </form>
            @endif

            <!-- Delete -->
            <form action="{{ route('notifications.delete', $notif->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button>
                <img src="{{ asset('img/trash.png') }}" class="w-6 h-6">
              </button>
            </form>

          </div>
        </div>

      @empty

        <p class="text-gray-500 text-sm">No notifications yet.</p>

      @endforelse
    </main>
  </div>

</body>
</html>

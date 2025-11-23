<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; }

    /* Hilangkan background di layar kecil */
    @media (max-width: 768px) {
      body {
        background-image: none !important;
        background-color: #fff !important;
      }
    }
  </style>
</head>

<body class="bg-white antialiased"
  style="background-image: url('{{ asset('img/auth_background.png') }}');
         background-repeat:no-repeat;
         background-position: right center;
         background-size: cover;">

<main class="min-h-screen flex items-center justify-center px-6">
  <div class="w-full max-w-[1200px] mx-auto">
    
    <!-- Layout responsif -->
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6">

      <!-- Mobile: teks di atas -->
      <div class="block md:hidden text-center mt-12 mb-4">
        <h2 class="text-4xl font-extrabold mb-2 text-gray-900">Hey there!</h2>
        <p class="text-base text-gray-700">Glad to see you again.<br>Let’s log in.</p>
      </div>

      <!-- LEFT: FORM -->
      <div class="order-2 md:order-1 flex flex-col justify-center items-center md:items-start md:pl-12 lg:pl-20 xl:pl-32 py-8 md:py-24 text-center md:text-left">
        <div class="w-full max-w-md">
          <h1 class="text-3xl md:text-4xl font-medium text-black mb-8">Login</h1>

          <!-- tampilkan error jika ada -->
          @if ($errors->any())
            <div class="mb-4 text-sm text-red-700">
              {{ $errors->first() }}
            </div>
          @endif

          @if (session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg p-3">
              {{ session('success') }}
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}" class="space-y-6 w-full">
            @csrf

            <input
              name="email"
              type="email"
              value="{{ old('email') }}"
              placeholder="Email"
              required
              class="w-full border-2 border-gray-300 rounded-xl px-5 py-4 text-base placeholder-gray-500 focus:outline-none focus:border-gray-400"
            />

            <input
              name="password"
              type="password"
              placeholder="Password"
              required
              class="w-full border-2 border-gray-300 rounded-xl px-5 py-4 text-base placeholder-gray-500 focus:outline-none focus:border-gray-400"
            />

            <div class="flex items-center justify-between text-sm text-gray-700">
              <label class="flex items-center space-x-3">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300" />
                <span>Remember me</span>
              </label>

              <a href="#" class="text-sm text-gray-700 hover:underline">Forgot password</a>
            </div>

            <button
              type="submit"
              class="w-full bg-[#FFC600] border border-[#b38600] rounded-xl py-3 text-black font-medium hover:shadow-md transition"
            >
              Submit
            </button>

            <p class="text-sm text-gray-700 mt-2">
              Belum punya akun?
              <a href="{{ route('register.form') }}" class="text-blue-600 underline">Register</a>
            </p>
          </form>
        </div>
      </div>

      <!-- RIGHT: TEKS (desktop only) -->
      <div class="hidden md:flex items-center justify-center md:pr-12 lg:pr-24 py-24 order-1 md:order-2">
        <div class="max-w-lg text-right">
          <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-4">Hey there!</h2>
          <p class="text-lg text-gray-800">Glad to see you again. <br>Let’s log in.</p>
        </div>
      </div>

    </div>
  </div>
</main>

</body>
</html>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-white antialiased"
      style="background-image: url('{{ asset('img/auth_background.png') }}'); background-repeat:no-repeat; background-position: right center; background-size: cover;">

  <main class="min-h-screen flex items-center">
    <div class="w-full max-w-[1200px] mx-auto px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6">

        <!-- LEFT: FORM REGISTER -->
        <div class="md:pl-12 lg:pl-20 xl:pl-32 py-24">
          <h1 class="text-4xl font-medium text-black mb-8">Register</h1>

          @if ($errors->any())
            <div class="mb-4 text-sm text-red-700">
              {{ $errors->first() }}
            </div>
          @endif

          <form method="POST" action="{{ route('register') }}" class="max-w-md space-y-6">
            @csrf

            <input
              name="name"
              type="text"
              value="{{ old('name') }}"
              placeholder="Username"
              required
              class="w-full border-2 border-gray-300 rounded-xl px-5 py-4 text-base placeholder-gray-500 focus:outline-none focus:border-gray-400"
            />

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

            <input
              name="password_confirmation"
              type="password"
              placeholder="Confirm Password"
              required
              class="w-full border-2 border-gray-300 rounded-xl px-5 py-4 text-base placeholder-gray-500 focus:outline-none focus:border-gray-400"
            />

            <button
              type="submit"
              class="w-full bg-[#FFC600] border border-[#b38600] rounded-xl py-3 text-black font-medium hover:shadow-md transition"
            >
              Submit
            </button>

            <p class="text-sm text-gray-700 mt-2">
              Sudah punya akun?
              <a href="{{ route('login.form') }}" class="text-blue-600 underline">Login</a>
            </p>
          </form>
        </div>

        <!-- RIGHT: Teks -->
        <div class="flex items-center justify-center md:pr-12 lg:pr-24 py-24">
          <div class="max-w-lg text-right">
            <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-4">Join us!</h2>
            <p class="text-lg text-gray-800">It only takes a minute to sign up.</p>
          </div>
        </div>

      </div>
    </div>
  </main>

</body>
</html>

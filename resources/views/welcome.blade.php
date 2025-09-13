<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - EduGlory</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            
            <!-- Logo + Nama -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('img/edu_glory.png') }}" alt="EduGlory Logo" class="h-8 w-8">
                <h1 class="text-xl font-bold text-[#FFC600]">EduGlory</h1>
            </div>

            <!-- Menu -->
            <nav class="space-x-6">
                <a href="#" class="text-[#FFC600] font-semibold">Home</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">Features</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">About</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">Product</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">FAQ</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">Testimonial</a>
                <a href="#" class="text-gray-700 hover:text-[#FEDD00]">Contact</a>
            </nav>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="bg-[#A2D6F9] flex-grow">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-16 px-6">
            
            <!-- Text -->
            <div>
                <h2 class="text-4xl md:text-5xl font-bold leading-tight text-gray-900">
                    Scholarships and Competitions <br> For the Great Generation
                </h2>
                <p class="text-gray-600 mt-4">
                    Edu Glory is here as a platform that helps students find scholarships, participate in competitions, and achieve the best results for a bright future.
                </p>
                <a href="{{ route('login.form') }}"
                   class="inline-block mt-6 bg-[#FFC600] hover:bg-[#FEDD00] text-white font-semibold py-3 px-6 rounded-md shadow-md">
                   More Info
                </a>
            </div>

            <!-- Image -->
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('img/welcome_img.png') }}" alt="Smart Watch" class="w-72 md:w-96">
            </div>
        </div>
    </section>

    <!-- Section Fitur Utama -->
    <section class="max-w-6xl mx-auto px-4 py-12 mb-32">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-12">Fitur Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">

        <!-- Beasiswa Terbaru -->
        <div>
            <div class="w-20 h-20 mx-auto rounded-full bg-orange-100 flex items-center justify-center">
            <img src={{ asset('img/scholarship.png') }} alt="Beasiswa" class="w-10 h-10">
            </div>
            <h3 class="text-lg font-semibold mt-4">Beasiswa Terbaru</h3>
            <p class="text-sm text-gray-500">Temukan informasi beasiswa nasional & internasional dengan mudah.</p>
        </div>

        <!-- Lomba Bergengsi -->
        <div>
            <div class="w-20 h-20 mx-auto rounded-full bg-orange-100 flex items-center justify-center">
            <img src={{ asset('img/trophy.png') }} alt="Lomba" class="w-10 h-10">
            </div>
            <h3 class="text-lg font-semibold mt-4">Lomba Bergengsi</h3>
            <p class="text-sm text-gray-500">Ikuti berbagai kompetisi untuk mengasah skill dan meraih prestasi.</p>
        </div>

        <!-- Notifikasi Cepat -->
        <div>
            <div class="w-20 h-20 mx-auto rounded-full bg-orange-100 flex items-center justify-center">
            <img src={{ asset('img/notification.png') }} alt="Notifikasi" class="w-10 h-10">
            </div>
            <h3 class="text-lg font-semibold mt-4">Notifikasi Cepat</h3>
            <p class="text-sm text-gray-500">Dapatkan pengingat otomatis agar tidak ketinggalan deadline penting.</p>
        </div>

        <!-- Komunitas Inspiratif -->
        <div>
            <div class="w-20 h-20 mx-auto rounded-full bg-orange-100 flex items-center justify-center">
            <img src={{ asset('img/community.png') }} alt="Komunitas" class="w-10 h-10">
            </div>
            <h3 class="text-lg font-semibold mt-4">Komunitas Inspiratif</h3>
            <p class="text-sm text-gray-500">Terhubung dengan pelajar & mahasiswa berprestasi di seluruh Indonesia.</p>
        </div>

        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-600 text-white text-center py-4">
        <p>© 2025 Edu Glory – One Step Towards Achievement and a Brilliant Future</p>
    </footer>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a2e0e9f6d2.js" crossorigin="anonymous"></script>
</body>
</html>

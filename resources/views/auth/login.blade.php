<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - SMP Pancasila Krian</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="min-h-screen flex">
  <!-- Bagian Kiri -->
  <div class="hidden lg:flex relative w-1/2 h-screen">
    <img src="{{ asset('images/login-admin.jpg') }}" 
         alt="Login Admin" 
         class="w-full h-full object-cover object-center">

    <!-- Overlay teks -->
    <div class="absolute inset-0 bg-black/30 flex flex-col justify-center items-start px-16 text-white">
      <h1 class="text-4xl font-bold mb-4">SMP Pancasila Krian</h1>
      <p class="mb-6 max-w-md leading-relaxed text-lg">
        SMP Pancasila berkomitmen memberikan pendidikan terbaik 
        dengan semangat Pancasila untuk generasi penerus bangsa.
      </p>
      <a href="#" 
         class="px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-blue-700 transition">
         Kunjungi kami...
      </a>
    </div>
  </div>

  <!-- Bagian Kanan -->
  <div class="flex w-full lg:w-1/2 justify-center items-center bg-gray-50">
    <div class="w-full max-w-md p-8">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="Logo"
             class="w-20 h-20 rounded-full shadow-md">
      </div>

      <!-- Judul -->
      <h2 class="text-3xl font-bold text-center text-indigo-800 mb-2">Selamat datang</h2>
      <p class="text-center text-gray-600 mb-8">Silahkan masukan email dan password.</p>

      <!-- Form -->
      <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf
        <div>
          <input type="email" id="email" name="email" placeholder="Email" required
            class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>
        <div>
          <input type="password" id="password" name="password" placeholder="Password" required
            class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>
        <button type="submit"
          class="w-full py-3 bg-indigo-700 text-white font-semibold rounded-lg hover:bg-indigo-800 transition">
          Login
        </button>
      </form>

      <!-- Info -->
      <p class="text-sm text-center text-gray-500 mt-6">
        Butuh bantuan bisa hubungi <a href="#" class="text-indigo-600 hover:underline">disini</a>
      </p>
      <p class="text-xs text-center text-gray-400 mt-4">© 2025 SMP Pancasila Krian</p>
    </div>
  </div>
</body>
</html>

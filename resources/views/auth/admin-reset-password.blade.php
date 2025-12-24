<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - Admin SMP Pancasila Krian</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 animate-slide-up">
    <h2 class="text-2xl font-bold text-indigo-800 text-center mb-4">Reset Password</h2>
    <p class="text-center text-gray-600 mb-6">
      Masukkan password baru Anda dan konfirmasi ulang untuk menyelesaikan reset password.
    </p>

    <form method="POST" class="space-y-4">
      @csrf

      <input 
        type="password" 
        name="password" 
        placeholder="Password Baru" 
        required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 text-gray-700"
      >

      <input 
        type="password" 
        name="password_confirmation" 
        placeholder="Ulangi Password" 
        required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 text-gray-700"
      >

      <button 
        type="submit"
        class="w-full py-3 bg-indigo-700 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-800 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5"
      >
        Reset Password
      </button>

      @if(session('error'))
        <p class="text-red-500 text-sm mt-2 text-center">{{ session('error') }}</p>
      @endif

      @if(session('success'))
        <p class="text-green-600 text-sm mt-2 text-center">{{ session('success') }}</p>
      @endif
    </form>
  </div>

  <!-- Animasi slide-up -->
  <style>
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up {
      animation: slideUp 0.6s ease-out forwards;
    }
  </style>

</body>
</html>

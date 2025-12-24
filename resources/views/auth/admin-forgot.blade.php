<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password Admin - SMP Pancasila Krian</title>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Poppins', sans-serif; }
    
    /* Fade + Slide Up Animation */
    .fade-slide-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .fade-slide-up.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">

<div id="card" class="w-full max-w-md p-6 sm:p-8 bg-white rounded-2xl shadow-lg border border-gray-200 fade-slide-up">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 rounded-full shadow-md">
    </div>

    <!-- Judul -->
    <h2 class="text-2xl font-bold text-center text-indigo-800 mb-2">Lupa Password Admin</h2>
    <p class="text-center text-gray-600 mb-6 text-sm sm:text-base">Masukkan email terdaftar untuk menerima OTP verifikasi.</p>

    <!-- Form Kirim OTP -->
    <form method="POST" action="{{ route('admin.forgot') }}" class="space-y-5">
        @csrf

        <!-- Email Input -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Admin</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                placeholder="admin@domain.com" 
                required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                       shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                       outline-none transition duration-200"
            >
        </div>

        <!-- Send OTP Button -->
        <button type="submit"
            class="w-full flex justify-center items-center gap-2
                   bg-indigo-600 text-white font-semibold rounded-lg
                   px-6 py-3 shadow-md hover:shadow-lg
                   hover:bg-indigo-700 transition-all duration-300
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1
                   transform hover:scale-105">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Kirim OTP
        </button>

        <!-- Error Message -->
        @if(session('error'))
            <div class="text-sm text-red-600 text-center font-medium">
                {{ session('error') }}
            </div>
        @endif

        <!-- Info -->
        <p class="text-xs text-center text-gray-400 mt-4">© 2025 SMP Pancasila Krian</p>
    </form>

</div>

<script>
    // Animasi slide muncul saat load
    document.addEventListener('DOMContentLoaded', () => {
        const card = document.getElementById('card');
        setTimeout(() => card.classList.add('show'), 100);
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP Pancasila Krian')</title>

    <!-- SEO Meta -->
    <meta name="description" content="SMP Pancasila Krian adalah sekolah menengah pertama yang berkomitmen memberikan pendidikan berkualitas dengan mengembangkan karakter siswa berdasarkan nilai-nilai Pancasila.">
    <meta name="keywords" content="SMP Pancasila Krian, sekolah menengah pertama, pendidikan karakter, Krian Sidoarjo, sekolah unggulan">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="min-h-screen bg-gray-50">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

</body>
</html>

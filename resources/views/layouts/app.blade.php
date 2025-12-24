{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP Pancasila Krian')</title>

    <!-- Fonts & Tailwind CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }

        .navbar-scrolled{
            background:rgba(255,255,255,.95);
            box-shadow:0 8px 30px rgba(0,0,0,.05);
        }

        .nav-link{
            position:relative;
            color:#374151;
            transition:.2s;
        }
        .nav-link:hover{ color:#16a34a }
        .nav-link::after{
            content:''; position:absolute; left:0; bottom:-6px;
            width:0; height:2px; background:#16a34a; transition:.3s;
        }
        .nav-link:hover::after{ width:100% }

        .mobile-link{ display:block; color:#374151; }
        .mobile-link:hover{ color:#16a34a }
    </style>
</head>
<body class="antialiased bg-gray-50">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Navbar Script --}}

    <script>
   document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const ham = document.getElementById('hamburger');
    const closeIcon = document.getElementById('close');
    const navbar = document.getElementById('navbar');

    if (!btn || !menu) return;

    // reset menu awal
    menu.classList.add('hidden');
    ham.classList.remove('hidden');
    closeIcon.classList.add('hidden');

    // toggle menu
    btn.addEventListener('click', () => {
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            ham.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
            ham.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // close saat klik link mobile
    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
            ham.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });

    // close saat resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            menu.classList.add('hidden');
            ham.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // scroll effect
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('navbar-scrolled', window.scrollY > 60);
    });
});

</script>

</body>
</html>

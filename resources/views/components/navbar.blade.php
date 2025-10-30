<nav class="fixed w-full top-0 z-50 shadow-md bg-gradient-to-r from-green-600 to-green-500 transition-all duration-500" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Pancasila" class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">SMP Pancasila</h1>
                    <p class="text-xs text-green-100">Krian</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}#home" class="nav-link text-white">Beranda</a>
                <a href="{{ route('tentang') }}" class="nav-link text-white">Tentang</a>
                <a href="{{ route('programs.index') }}" class="nav-link text-white">Ekstrakulikuler</a>
                <a href="{{ route('fasilitas.index') }}" class="nav-link text-white">Fasilitas</a>
                <a href="{{ route('berita.public.index') }}" class="nav-link text-white">Berita</a>
                <a href="{{ route('contact') }}"  class="mobile-link text-white">Kontak</a>
            </div>

            <!-- Mobile button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg id="hamburger" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close" class="h-7 w-7 hidden" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Dropdown Mobile Menu -->
    <div id="mobile-menu" class="hidden bg-gradient-to-r from-green-600 to-green-500 overflow-hidden transition-all duration-300 ease-in-out">
        <div class="flex flex-col space-y-2 py-3 px-6">
            <a href="{{ route('home') }}#home" class="mobile-link text-white">Beranda</a>
            <a href="{{ route('tentang') }}" class="mobile-link text-white">Tentang</a>
            <a href="{{ route('programs.index') }}" class="mobile-link text-white">Ekstrakulikuler</a>
            <a href="{{ route('fasilitas.index') }}" class="mobile-link text-white">Fasilitas</a>
            <a href="{{ route('berita.public.index') }}" class="mobile-link text-white">Berita</a>
            <a href="{{ route('contact') }}"  class="mobile-link text-white">Kontak</a>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        @apply text-sm font-medium transition-colors duration-200 hover:text-green-100;
    }
    .mobile-link {
        @apply block text-base font-medium transition-all duration-200 hover:text-green-100;
    }
    .btn-primary {
        @apply px-4 py-2 rounded-lg font-medium transition;
    }

    /* Warna transparan ketika scroll */
    .navbar-transparent {
        background: rgba(34, 197, 94, 0.6); /* hijau transparan */
        backdrop-filter: blur(8px);
    }
</style>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger');
    const closeIcon = document.getElementById('close');
    const navbar = document.getElementById('navbar');

    mobileMenuBtn.addEventListener('click', () => {
        const isHidden = mobileMenu.classList.contains('hidden');
        if (isHidden) {
           // mobileMenu.classList.remove('hidden');
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            mobileMenu.style.maxHeight = "0";
            setTimeout(() => mobileMenu.classList.add('hidden'), 200);
            hamburgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Navbar transparency on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-transparent');
        } else {
            navbar.classList.remove('navbar-transparent');
        }
    });
</script>

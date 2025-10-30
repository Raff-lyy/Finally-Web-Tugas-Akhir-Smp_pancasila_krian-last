<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMP Pancasila Krian - Sekolah Berkarakter dan Berprestasi</title>
    <meta name="description" content="SMP Pancasila Krian adalah sekolah menengah pertama yang berkomitmen memberikan pendidikan berkualitas dengan mengembangkan karakter siswa berdasarkan nilai-nilai Pancasila.">
    <meta name="keywords" content="SMP Pancasila Krian, sekolah menengah pertama, pendidikan karakter, Krian Sidoarjo, sekolah unggulan">
    <meta name="author" content="SMP Pancasila Krian">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="SMP Pancasila Krian - Sekolah Berkarakter dan Berprestasi">
    <meta property="og:description" content="Sekolah menengah pertama yang berkomitmen memberikan pendidikan berkualitas dengan mengembangkan karakter siswa berdasarkan nilai-nilai Pancasila.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Loading Animation */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        .loading-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }
        
        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid #dcfce7;
            border-top: 4px solid #16a34a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition: color 0.2s ease, background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #16a34a;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #15803d;
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Intersection Observer animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Loading Screen -->
    <div class="loading-screen" id="loading-screen">
        <div class="text-center">
            <div class="loader mb-4"></div>
            <div class="text-primary-600 font-semibold">Memuat...</div>
        </div>
    </div>

    <!-- Navigation -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <div class="animate-on-scroll">
            @include('components.hero')
        </div>

        <!-- About Section -->
        <div class="animate-on-scroll">
            @include('components.about')
        </div>

        <div class="animate-on-scroll">
    @include('components.teachers')
</div>

        <!-- Programs Section -->
        <div class="animate-on-scroll">
            @include('components.programs')
        </div>

        <!-- Facilities Section -->
        <div class="animate-on-scroll">
            @include('components.facilities')
        </div>

        <!-- Blog Section -->
<div class="animate-on-scroll">
    <x-blog :featured="$featured" :news="$news" />
</div>


        <!-- Contact Section -->
        <div class="animate-on-scroll">
            @include('components.contact')
        </div>

        
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
   <script>
    // Loading screen
    window.addEventListener('load', function() {
        const loadingScreen = document.getElementById('loading-screen');
        setTimeout(() => {
            loadingScreen.classList.add('fade-out');
            setTimeout(() => {
                loadingScreen.style.display = 'none';
            }, 500);
        }, 1000);
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);

    // Observe all elements with animate-on-scroll class
    document.addEventListener('DOMContentLoaded', function() {
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        animateElements.forEach(el => scrollObserver.observe(el));
    });

    // Smooth scrolling for anchor links
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 80; // Account for fixed navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });

    // Add active class to navigation links based on scroll position
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('text-primary-600');
            link.classList.add('text-gray-700');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.remove('text-gray-700');
                link.classList.add('text-primary-600');
            }
        });
    });

    // Performance optimization: Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Add keyboard navigation support
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });

    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });

    // Console message for developers
    console.log('%c🎓 SMP Pancasila Krian', 'color: #16a34a; font-size: 24px; font-weight: bold;');
    console.log('%cWebsite ini dibuat dengan Laravel & Tailwind CSS', 'color: #6b7280; font-size: 14px;');
    console.log('%cUntuk informasi lebih lanjut: info@smppancasilakrian.sch.id', 'color: #6b7280; font-size: 14px;');
</script>


    <!-- Schema.org structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "SMP Pancasila Krian",
        "description": "Sekolah menengah pertama yang berkomitmen memberikan pendidikan berkualitas dengan mengembangkan karakter siswa berdasarkan nilai-nilai Pancasila.",
        "url": "{{ url('/') }}",
        "telephone": "(031) 123-4567",
        "email": "info@smppancasilakrian.sch.id",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Raya Krian No. 123",
            "addressLocality": "Krian",
            "addressRegion": "Jawa Timur",
            "postalCode": "61262",
            "addressCountry": "ID"
        },
        "openingHours": [
            "Mo-Fr 07:00-15:00",
            "Sa 07:00-12:00"
        ],
        "sameAs": [
            "https://www.facebook.com/smppancasilakrian",
            "https://www.instagram.com/smppancasilakrian"
        ]
    }
    </script>
</body>
</html>


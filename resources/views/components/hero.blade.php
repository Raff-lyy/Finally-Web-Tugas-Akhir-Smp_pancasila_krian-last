<section id="home" 
    class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat overflow-hidden" 
    style="background-image: url('{{ asset('images/bg-guru.jpg') }}')">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <!-- School Logo/Icon -->
        

        <!-- Main Heading -->
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-shadow">
            <span class="block">SMP Pancasila</span>
            <span class="block text-primary-400">Krian</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
            Membentuk generasi yang berkarakter, berprestasi, dan berakhlak mulia dengan pendidikan berkualitas tinggi
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <a href="#about" class="bg-primary-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                Tentang Kami
            </a>
            <a href="#programs" class="border-2 border-primary-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-600 hover:text-white transform hover:scale-105 transition-all duration-300">
                Program Unggulan
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2" data-count="500">0</div>
                <div class="font-medium">Siswa Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2" data-count="45">0</div>
                <div class="font-medium">Guru Berpengalaman</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2" data-count="15">0</div>
                <div class="font-medium">Program Unggulan</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2" data-count="25">0</div>
                <div class="font-medium">Tahun Berpengalaman</div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
        <a href="#about" class="text-primary-400 hover:text-primary-500 transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </div>
</section>


<script>
    // Counter animation
    function animateCounters() {
        const counters = document.querySelectorAll('[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 16);
        });
    }

    // Trigger counter animation when hero section is in view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    });

    observer.observe(document.getElementById('home'));

    // Smooth scroll for CTA buttons
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>


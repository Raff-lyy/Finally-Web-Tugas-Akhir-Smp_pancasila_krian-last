@php
$hero = \App\Models\Hero::where('slug','hai')->first();
$stats = $hero->stats ?? ['students'=>500,'teachers'=>45,'programs'=>15,'years'=>25];
@endphp

<section id="home"
    class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat overflow-hidden"
    style="background-image: url('{{ $hero && $hero->background_image ? asset('storage/'.$hero->background_image) : asset('images/bg-guru.jpg') }}')">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-shadow">
            <span class="block">{{ $hero->title ?? 'SMP Pancasila' }}</span>
            <span class="block text-primary-400">Krian</span>
        </h1>

        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
            {{ $hero->subtitle ?? 'Membentuk generasi yang berkarakter, berprestasi, dan berakhlak mulia.' }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <!-- Tombol 1 → route('tentang') -->
            <a href="{{ route('tentang') }}"
               class="bg-primary-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                {{ $hero->button_1_text ?? 'Tentang Kami' }}
            </a>

            <!-- Tombol 2 → route('program') -->
            <a href="{{ route('fasilitas.index') }}"
               class="border-2 border-primary-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-primary-600 hover:text-white transform hover:scale-105 transition-all duration-300">
                {{ $hero->button_2_text ?? 'Fasilitas Unggulan' }}
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2 counter" data-target="{{ $stats['students'] ?? 500 }}">0</div>
                <div class="font-medium">Siswa Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2 counter" data-target="{{ $stats['teachers'] ?? 45 }}">0</div>
                <div class="font-medium">Guru Berpengalaman</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2 counter" data-target="{{ $stats['programs'] ?? 15 }}">0</div>
                <div class="font-medium">Program Unggulan</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary-400 mb-2 counter" data-target="{{ $stats['years'] ?? 25 }}">0</div>
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
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = Number(counter.getAttribute('data-target')) || 0;
        let current = 0;
        const duration = 2000;
        const stepTime = Math.floor(duration / target) || 1;
        const timer = setInterval(() => {
            current++;
            counter.textContent = current;
            if(current >= target){
                counter.textContent = target;
                clearInterval(timer);
            }
        }, stepTime);
    });
}

const heroSection = document.getElementById('home');
if(heroSection) {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    observer.observe(heroSection);
}
</script>

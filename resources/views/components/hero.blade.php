@php
    $hero = \App\Models\Hero::where('slug', 'hai')->first();
    $stats = $hero->stats ?? [
        'students' => 500,
        'teachers' => 45,
        'programs' => 15,
        'years' => 25
    ];
@endphp

<section id="home" class="relative min-h-screen overflow-hidden">

    <!-- BG IMAGE -->
    <img
        src="{{ $hero && $hero->background_image ? asset('storage/' . $hero->background_image) : asset('images/bg-guru.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover scale-105"
        alt="SMP Pancasila Krian">

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/60 to-primary-900/40"></div>

    <!-- CONTENT -->
    <div
        class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6
               pt-28 sm:pt-36 lg:pt-44
               pb-16">

        <div class="max-w-4xl mx-auto text-center">

            <span
                class="inline-flex justify-center mb-6 px-4 py-2 text-xs sm:text-sm
                       bg-white/10 text-white rounded-full backdrop-blur">
                🎓 Sekolah Berkarakter & Berprestasi
            </span>

            <h1
                class="text-3xl sm:text-4xl md:text-6xl xl:text-7xl
                       font-extrabold leading-tight tracking-tight">

                <span class="block text-white drop-shadow-md">
                    Selamat Datang di
                </span>

                <span
                    class="block mt-2 bg-gradient-to-r from-green-300 via-green-400 to-green-600
                           bg-clip-text text-transparent drop-shadow-lg">
                    {{ $hero->title ?? 'SMP Pancasila Krian' }}
                </span>
            </h1>

            <p class="mt-6 text-base sm:text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">
                {{ $hero->subtitle ?? 'Membentuk generasi berkarakter, berprestasi, dan siap menghadapi masa depan.' }}
            </p>

            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="{{ route('contact') }}"
                    class="px-7 py-3 sm:px-9 sm:py-4
                           border border-white/30 text-white rounded-2xl
                           hover:bg-white/10 transition">
                    {{ $hero->button_1_text ?? 'Tentang Kami' }}
                </a>

                <a href="{{ route('fasilitas.index') }}"
                    class="px-7 py-3 sm:px-9 sm:py-4
                           border border-white/30 text-white rounded-2xl
                           hover:bg-white/10 transition">
                    {{ $hero->button_2_text ?? 'Fasilitas Unggulan' }}
                </a>
            </div>

        </div>
    </div>

    <!-- STATS -->
    <!-- mobile & tablet: normal flow | desktop: absolute -->
    <div
        class="relative lg:absolute
               lg:bottom-20
               left-0 right-0
               z-20
               mt-12 lg:mt-0">

        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">

                <div class="bg-white/10 backdrop-blur-md border border-white/30
                            rounded-2xl p-4 sm:p-6 text-center shadow-lg">
                    <div class="text-2xl sm:text-4xl font-extrabold text-white counter"
                         data-target="{{ $stats['students'] }}">0</div>
                    <p class="mt-1 text-xs sm:text-sm text-white">Siswa Aktif</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md border border-white/30
                            rounded-2xl p-4 sm:p-6 text-center shadow-lg">
                    <div class="text-2xl sm:text-4xl font-extrabold text-white counter"
                         data-target="{{ $stats['teachers'] }}">0</div>
                    <p class="mt-1 text-xs sm:text-sm text-white">Guru Profesional</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md border border-white/30
                            rounded-2xl p-4 sm:p-6 text-center shadow-lg">
                    <div class="text-2xl sm:text-4xl font-extrabold text-white counter"
                         data-target="{{ $stats['programs'] }}">0</div>
                    <p class="mt-1 text-xs sm:text-sm text-white">Program Unggulan</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md border border-white/30
                            rounded-2xl p-4 sm:p-6 text-center shadow-lg">
                    <div class="text-2xl sm:text-4xl font-extrabold text-white counter"
                         data-target="{{ $stats['years'] }}">0</div>
                    <p class="mt-1 text-xs sm:text-sm text-white">Tahun Berdiri</p>
                </div>

            </div>
        </div>
    </div>

</section>

<script>
    function animateCounters() {
        document.querySelectorAll('.counter').forEach(counter => {
            const target = Number(counter.dataset.target) || 0
            let current = 0
            const step = Math.max(1, target / 60)

            const timer = setInterval(() => {
                current += step
                if (current >= target) {
                    counter.textContent = target
                    clearInterval(timer)
                } else {
                    counter.textContent = Math.floor(current)
                }
            }, 25)
        })
    }

    const heroSection = document.getElementById('home')
    if (heroSection) {
        const observer = new IntersectionObserver(entries => {
            if (entries[0].isIntersecting) {
                animateCounters()
                observer.disconnect()
            }
        }, { threshold: 0.3 })

        observer.observe(heroSection)
    }
</script>

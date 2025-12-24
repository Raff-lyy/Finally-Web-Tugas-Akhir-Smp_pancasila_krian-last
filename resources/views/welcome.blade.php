{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'SMP Pancasila Krian - Sekolah Berkarakter dan Berprestasi')

@section('content')

<!-- HERO -->
<section class="relative bg-gradient-to-br from-primary-50 to-white overflow-hidden hero-parallax">
    <div class="animate-on-scroll scale-fade">
        @include('components.hero')
    </div>
</section>

<!-- ABOUT -->
<section id="profil" class="py-24">
    <div class="animate-on-scroll scale-fade">
        @include('components.about')
    </div>
</section>

<!-- TEACHERS -->
<section id="guru" class="py-24 bg-slate-50">
    <div class="animate-on-scroll scale-fade">
        @include('components.teachers')
    </div>
</section>

<!-- PROGRAMS -->
<section id="program" class="py-24 program-parallax">
    <div class="animate-on-scroll scale-fade">
        @include('components.programs')
    </div>
</section>

<!-- FACILITIES -->
<section id="facilities" class="py-24 bg-slate-50">
    <div class="animate-on-scroll scale-fade">
        @include('components.facilities')
    </div>
</section>

<!-- BLOG -->
<section id="blog" class="py-24">
    <div class="animate-on-scroll scale-fade">
        <x-blog :featured="$featured" :news="$news" />
    </div>
</section>

<!-- CONTACT -->
<section id="kontak" class="py-24 bg-primary-600 text-white">
    <div class="animate-on-scroll scale-fade">
        @include('components.contact')
    </div>
</section>

@endsection

@section('styles')
<style>
/* Animasi scroll lebih canggih */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    transition: all 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

.animate-on-scroll.animated {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.scale-fade > * {
    opacity: 0;
    transform: translateY(20px) scale(0.97);
    transition: all 0.7s ease-out;
}

.scale-fade.animated > * {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Staggered animation delay */
.scale-fade.animated > *:nth-child(1) { transition-delay: 0.1s; }
.scale-fade.animated > *:nth-child(2) { transition-delay: 0.2s; }
.scale-fade.animated > *:nth-child(3) { transition-delay: 0.3s; }
.scale-fade.animated > *:nth-child(4) { transition-delay: 0.4s; }
.scale-fade.animated > *:nth-child(5) { transition-delay: 0.5s; }

/* Parallax ringan */
.hero-parallax {
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
}

.program-parallax {
    background-image: url('/images/program-bg.jpg'); /* ganti sesuai aset */
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    position: relative;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const animateSections = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    animateSections.forEach(el => observer.observe(el));

    // Optional: Smooth parallax scroll (for non-background-attachment support)
    const parallaxSections = document.querySelectorAll('.hero-parallax, .program-parallax');
    window.addEventListener('scroll', () => {
        parallaxSections.forEach(section => {
            const speed = 0.5;
            const offset = window.pageYOffset * speed;
            section.style.backgroundPositionY = `${offset}px`;
        });
    });
});
</script>
@endsection

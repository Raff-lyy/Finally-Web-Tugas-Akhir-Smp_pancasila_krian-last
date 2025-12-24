<nav id="navbar"
     class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b transition-all duration-300">

  <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

    <!-- LOGO -->
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-full overflow-hidden">
        <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Pancasila" class="w-full h-full object-cover">
      </div>

      <div class="font-extrabold text-lg text-dark leading-tight">
        SMP <span class="text-primary-600">Pancasila</span>
        <div class="text-[11px] font-medium text-gray-500 tracking-widest uppercase">Krian</div>
      </div>
    </div>

    <!-- DESKTOP MENU -->
    <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
      <a href="{{ route('home') }}#home" class="nav-link">Beranda</a>
      <a href="{{ route('tentang') }}" class="nav-link">Tentang</a>
      <a href="{{ route('programs.index') }}" class="nav-link">Ekstrakulikuler</a>
      <a href="{{ route('fasilitas.index') }}" class="nav-link">Fasilitas</a>
      <a href="{{ route('berita.public.index') }}" class="nav-link">Berita</a>

      <a href="{{ route('contact') }}" class="btn-contact ml-4">Kontak</a>
    </nav>

    <!-- MOBILE BUTTON -->
    <button id="mobile-menu-button" class="md:hidden w-10 h-10 flex items-center justify-center rounded-lg hover:bg-black/5">
      <svg id="hamburger" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
      <svg id="close" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

  </div>

  <!-- MOBILE MENU -->
  <div id="mobile-menu" data-open="false" class="md:hidden hidden bg-white border-t">
    <div class="px-6 py-6 space-y-4 text-sm font-medium">
      <a href="{{ route('home') }}#home" class="mobile-link">Beranda</a>
      <a href="{{ route('tentang') }}" class="mobile-link">Tentang</a>
      <a href="{{ route('programs.index') }}" class="mobile-link">Ekstrakulikuler</a>
      <a href="{{ route('fasilitas.index') }}" class="mobile-link">Fasilitas</a>
      <a href="{{ route('berita.public.index') }}" class="mobile-link">Berita</a>
      <a href="{{ route('contact') }}" class="btn-contact block text-center mt-4">Kontak</a>
    </div>
  </div>
</nav>

<style>
/* ===============================
   MOBILE MENU STYLE
================================ */
#mobile-menu{
  background:#ffffff;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
  border-top:1px solid #e5e7eb;
}

/* Semua link mobile (TERMASUK KONTAK) */
#mobile-menu .mobile-link,
#mobile-menu .btn-contact{
  display:flex;
  align-items:center;
  height:48px;
  padding:0 14px;
  border-radius:14px;
  font-size:15px;
  font-weight:500;
  color:#374151;
  background:transparent;
  transition:all .2s ease;
}

/* Hover sama rata */
#mobile-menu .mobile-link:hover,
#mobile-menu .btn-contact:hover{
  background:#f0fdf4;
  color:#16a34a;
}

/* HILANGKAN STYLE CTA KONTAK DI MOBILE */
#mobile-menu .btn-contact{
  margin-top:0;
  width:auto;
  text-align:left;
}

/* Hamburger button */
#mobile-menu-button{
  border-radius:12px;
}
#mobile-menu-button:hover{
  background:rgba(0,0,0,.05);
}
@media (max-width: 767px) {

  /* kasih jarak sebelum kontak */
  #mobile-menu .btn-contact{
    margin-top:8px;        /* ← ini kuncinya */
  }

}
</style>



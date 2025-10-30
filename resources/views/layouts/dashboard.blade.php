<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="flex h-screen overflow-hidden">

  <!-- Sidebar -->
  <aside id="sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-blue-700 to-blue-500 text-white flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50 shadow-xl">
    
    <div class="p-4 text-2xl font-bold border-b border-blue-400 flex justify-between items-center">
      <span>Hii Admin</span>
      <button id="closeSidebar" class="md:hidden text-white focus:outline-none text-xl">✕</button>
    </div>

    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
      <a href="{{ route('dashboard') }}" class="nav-link bg-blue-800">📊 Dashboard</a>
      <a href="{{ route('berita.index') }}" class="nav-link">📰 Berita</a>
      <a href="{{ route('guru.index') }}" class="nav-link">👩‍🏫 Guru & Staff</a>
      <a href="{{ route('users.index') }}" class="nav-link">👥 User</a>
      <a href="{{ route('dashboard.programs.index') }}" class="nav-link">📚 Program</a>
      <a href="{{ route('contacts.index') }}" class="nav-link">📩 Pesan Contact</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="p-4 border-t border-blue-400">
      @csrf
      <button class="w-full py-2 bg-red-600 rounded-lg hover:bg-red-700 font-medium">Logout</button>
    </form>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">

    <!-- Topbar -->
    <header class="flex justify-between items-center bg-white shadow-md p-4 md:p-6 sticky top-0 z-40">
      <div class="flex items-center space-x-4">
        <button id="openSidebar" class="md:hidden text-blue-600 focus:outline-none text-2xl">☰</button>
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
      </div>
      <span class="text-gray-600 hidden sm:block">
        👋 Halo, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
      </span>
    </header>

    <!-- Konten Halaman -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto space-y-6">
      @yield('content')
    </main>
  </div>
</div>

<style>
  .nav-link {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.55rem 1rem;
    border-radius: 0.5rem;
    color: white;
    font-weight: 500;
    transition: background-color 0.2s ease;
  }
  .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.15);
  }
  .card {
    padding: 1.25rem;
    border-radius: 0.75rem;
    color: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
</style>

<style>
  /* ==== Tambahan khusus chart section ==== */
  #chartBerita, #chartDistribusi {
    max-height: 260px; /* ukuran pas biar ga kebesaran */
  }

  @media (max-width: 1024px) {
    #chartBerita, #chartDistribusi {
      max-height: 220px;
    }
  }

  @media (max-width: 640px) {
    #chartBerita, #chartDistribusi {
      max-height: 180px;
    }
  }
</style>


<script>
  const sidebar = document.getElementById('sidebar');
  const openSidebar = document.getElementById('openSidebar');
  const closeSidebar = document.getElementById('closeSidebar');
  openSidebar.addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
  closeSidebar.addEventListener('click', () => sidebar.classList.add('-translate-x-full'));
</script>

@stack('scripts')
</body>
</html>

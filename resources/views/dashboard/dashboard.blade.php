@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
  <!-- Cards Section -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    <div class="card bg-blue-500">
      <h3 class="font-semibold text-white">Total Berita</h3>
      <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\News::count() }}</p>
      <p class="text-white/80 text-sm mt-1">Artikel dipublikasikan</p>
    </div>

    <div class="card bg-green-500">
      <h3 class="font-semibold text-white">Jumlah Guru</h3>
      <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\Teacher::count() }}</p>
      <p class="text-white/80 text-sm mt-1">Guru & Staff terdaftar</p>
    </div>

    <div class="card bg-orange-500">
      <h3 class="font-semibold text-white">Jumlah Program</h3>
      <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\Program::count() }}</p>
      <p class="text-white/80 text-sm mt-1">Program aktif</p>
    </div>

    <div class="card bg-red-500">
      <h3 class="font-semibold text-white">User</h3>
      <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\User::count() }}</p>
      <p class="text-white/80 text-sm mt-1">Akun terdaftar</p>
    </div>
  </div>

  <!-- Chart Section -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white p-4 lg:p-6 rounded-xl shadow">
      <h2 class="text-lg font-bold text-gray-700 mb-3">📊 Jumlah Berita per Bulan</h2>
      <canvas id="chartBerita"></canvas>
    </div>

    <div class="bg-white p-4 lg:p-6 rounded-xl shadow">
      <h2 class="text-lg font-bold text-gray-700 mb-3">📈 Distribusi Data</h2>
      <canvas id="chartDistribusi"></canvas>
    </div>
  </div>

  <!-- Pesan Masuk -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-6 overflow-x-auto">
    <h2 class="text-lg sm:text-xl font-bold mb-4 text-gray-800">Pesan Masuk Terbaru</h2>
    <table class="min-w-full border text-left text-sm">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="p-2 border">Nama</th>
          <th class="p-2 border">Email</th>
          <th class="p-2 border">Pesan</th>
          <th class="p-2 border">Balas</th>
        </tr>
      </thead>
      <tbody>
        @forelse(\App\Models\Contact::latest()->take(5)->get() as $p)
          <tr class="hover:bg-gray-100">
            <td class="p-2 border">{{ $p->nama }}</td>
            <td class="p-2 border break-all">{{ $p->email }}</td>
            <td class="p-2 border">{{ \Illuminate\Support\Str::limit($p->pesan, 40) }}</td>
            <td class="p-2 border text-center">
              <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $p->email }}" target="_blank"
                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm block sm:inline-block">
                Balas
              </a>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="p-4 text-center text-gray-500">Belum ada pesan</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection

@push('scripts')
<script>
  const beritaLabels = @json(\App\Models\News::selectRaw('MONTH(created_at) bulan, COUNT(*) total')
    ->groupBy('bulan')->pluck('bulan'));
  const beritaData = @json(\App\Models\News::selectRaw('MONTH(created_at) bulan, COUNT(*) total')
    ->groupBy('bulan')->pluck('total'));

  const distribusiData = {
    labels: ['Berita', 'Guru', 'User', 'Program'],
    datasets: [{
      data: [
        {{ \App\Models\News::count() }},
        {{ \App\Models\Teacher::count() }},
        {{ \App\Models\User::count() }},
        {{ \App\Models\Program::count() }}
      ],
      backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
    }]
  };

  new Chart(document.getElementById('chartBerita'), {
    type: 'bar',
    data: {
      labels: beritaLabels.map(b => 'Bulan ' + b),
      datasets: [{
        label: 'Jumlah Berita',
        data: beritaData,
        backgroundColor: '#3B82F6',
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });

  new Chart(document.getElementById('chartDistribusi'), {
    type: 'pie',
    data: distribusiData,
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } }
    }
  });
</script>
@endpush

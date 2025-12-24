@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<!-- Cards Section -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
  <div class="card bg-gradient-to-r from-blue-500 to-blue-600">
    <h3 class="font-semibold text-white">Total Berita</h3>
    <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\News::count() }}</p>
    <p class="text-white/80 text-sm mt-1">Artikel dipublikasikan</p>
  </div>

  <div class="card bg-gradient-to-r from-gray-600 to-gray-700">
    <h3 class="font-semibold text-white">Jumlah Guru</h3>
    <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\Teacher::count() }}</p>
    <p class="text-white/80 text-sm mt-1">Guru & Staff terdaftar</p>
  </div>

  <div class="card bg-gradient-to-r from-orange-500 to-orange-600">
    <h3 class="font-semibold text-white">Jumlah Program</h3>
    <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\Program::count() }}</p>
    <p class="text-white/80 text-sm mt-1">Program aktif</p>
  </div>

  <div class="card bg-gradient-to-r from-red-500 to-red-600">
    <h3 class="font-semibold text-white">User</h3>
    <p class="text-3xl font-bold text-white mt-1">{{ \App\Models\User::count() }}</p>
    <p class="text-white/80 text-sm mt-1">Akun terdaftar</p>
  </div>

  <div class="card bg-gradient-to-r from-green-500 to-green-600">
    <h3 class="font-semibold text-white">Last Login IP</h3>
    <p class="text-2xl font-bold text-white mt-1">
      {{ auth()->user()->last_login_ip ?? 'Belum Login' }}
    </p>
    <p class="text-white/80 text-sm mt-1">IP login terakhir</p>
  </div>
</div>

<!-- Chart Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
  <div class="bg-white p-4 lg:p-6 rounded-xl shadow">
    <h2 class="text-lg font-bold text-gray-700 mb-3">📊 Jumlah Berita per Bulan</h2>
    <div class="w-full h-80">
      <canvas id="chartBerita"></canvas>
    </div>
  </div>

  <div class="bg-white p-4 lg:p-6 rounded-xl shadow">
    <h2 class="text-lg font-bold text-gray-700 mb-3">Distribusi Data</h2>
    <div class="w-full h-80">
      <canvas id="chartDistribusi"></canvas>
    </div>
  </div>
</div>

<!-- Pesan Masuk -->
<div class="bg-white rounded-xl shadow p-4 sm:p-6 mt-6 overflow-x-auto">
  <h2 class="text-lg sm:text-xl font-bold mb-4 text-gray-800">Pesan Masuk Terbaru</h2>
  <table class="min-w-full border text-left text-sm">
    <thead class="bg-gray-800 text-white">
      <tr>
        <th class="p-2 border">Nama</th>
        <th class="p-2 border">Email</th>
        <th class="p-2 border">Pesan</th>
        <th class="p-2 border">Balas</th>
      </tr>
    </thead>
    <tbody>
      @forelse(\App\Models\Contact::latest()->take(5)->get() as $p)
        <tr class="hover:bg-gray-50 transition">
          <td class="p-2 border">{{ $p->nama }}</td>
          <td class="p-2 border break-all">{{ $p->email }}</td>
          <td class="p-2 border">{{ \Illuminate\Support\Str::limit($p->pesan, 40) }}</td>
          <td class="p-2 border text-center">
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $p->email }}" target="_blank"
               class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-800 text-sm block sm:inline-block transition">
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
  // Hitung jumlah berita per bulan (1-12)
  const beritaPerBulan = @json(
    \App\Models\News::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->pluck('total', 'month')
  );

  const monthLabels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const beritaData = monthLabels.map((_,i) => beritaPerBulan[i+1] ?? 0);

  const distribusiData = {
    labels: ['Berita', 'Guru', 'User', 'Program'],
    datasets: [{
      data: [
        {{ \App\Models\News::count() }},
        {{ \App\Models\Teacher::count() }},
        {{ \App\Models\User::count() }},
        {{ \App\Models\Program::count() }}
      ],
      backgroundColor: ['#2563EB', '#6B7280', '#F59E0B', '#EF4444'],
    }]
  };

  // Chart Berita per Bulan
  new Chart(document.getElementById('chartBerita'), {
    type: 'line',
    data: {
      labels: monthLabels,
      datasets:[{
        label:'Jumlah Berita',
        data: beritaData,
        backgroundColor:'rgba(37,99,235,0.15)',
        borderColor:'#2563EB',
        borderWidth:2,
        fill:true,
        tension:0.3,
        pointBackgroundColor:'#2563EB',
        pointRadius:5
      }]
    },
    options:{
      responsive:true,
      maintainAspectRatio:false,
      plugins:{
        legend:{display:false},
        tooltip:{backgroundColor:'rgba(55,65,81,0.9)', titleColor:'#fff', bodyColor:'#fff'}
      },
      scales:{
        y:{beginAtZero:true, grid:{color:'rgba(0,0,0,0.05)'}, ticks:{color:'#374151'}},
        x:{grid:{display:false}, ticks:{color:'#374151'}}
      }
    }
  });

  // Chart Distribusi
  new Chart(document.getElementById('chartDistribusi'), {
    type:'doughnut',
    data:distribusiData,
    options:{
      responsive:true,
      maintainAspectRatio:false,
      cutout:'60%',
      plugins:{
        legend:{position:'bottom', labels:{color:'#374151'}},
        tooltip:{backgroundColor:'rgba(55,65,81,0.9)', titleColor:'#fff', bodyColor:'#fff'}
      }
    }
  });
</script>
@endpush

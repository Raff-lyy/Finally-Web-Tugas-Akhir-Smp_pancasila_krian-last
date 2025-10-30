@extends('layouts.dashboard')

@section('title', 'Manajemen Berita')

@section('content')
<div class="p-4 sm:p-6">

    <!-- Header -->
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        <h2 class="text-lg sm:text-2xl font-bold text-gray-800">Daftar Berita</h2>

        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
            <a href="{{ route('dashboard') }}" 
               class="w-full sm:w-auto px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-center text-sm sm:text-base font-medium transition">
                ⬅️ Kembali
            </a>
            <a href="{{ route('berita.create') }}" 
               class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-center text-sm sm:text-base font-medium transition">
                + Tambah Berita
            </a>
        </div>
    </div>


    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    {{-- ===== MOBILE: CARD LIST (visible on sm and below) ===== --}}
    <div class="space-y-3 md:hidden">
        @forelse($news as $item)
            <div class="bg-white shadow rounded-lg p-4">
                <div class="flex gap-3">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-20 h-20 rounded object-cover">
                    @else
                        <div class="w-20 h-20 bg-gray-100 flex items-center justify-center text-gray-400 rounded">-</div>
                    @endif
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 text-sm leading-tight mb-1">{{ $item->title }}</h3>
                        <p class="text-xs text-gray-500 mb-2">{{ $item->created_at->format('d M Y') }}</p>

                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('berita.edit', $item) }}"
                               class="block text-center px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs font-medium">
                                Edit
                            </a>

                            <form action="{{ route('berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white shadow rounded-lg p-4 text-center text-gray-500">Belum ada berita</div>
        @endforelse
    </div>

    {{-- ===== DESKTOP: TABLE VIEW ===== --}}
    <div class="hidden md:block bg-white shadow-md rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border-collapse">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="border border-indigo-500 p-3 text-left rounded-tl-lg">Judul</th>
                        <th class="border border-indigo-500 p-3 text-left">Gambar</th>
                        <th class="border border-indigo-500 p-3 text-left">Tanggal</th>
                        <th class="border border-indigo-500 p-3 text-center w-44 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="border p-3">{{ $item->title }}</td>
                            <td class="border p-3">
                                @if($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="h-12 w-20 object-cover rounded">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="border p-3">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="border p-3 text-center">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('berita.edit', $item) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1.5 rounded text-sm font-medium transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('berita.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded text-sm font-medium transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-6 text-gray-500">Belum ada berita</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- Pagination -->
    <div class="mt-4">
        {{ $news->links() }}
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('content')
<div class="p-4 sm:p-6">

    <!-- Header -->
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        <h1 class="text-lg sm:text-2xl font-bold text-gray-800">Daftar Guru & Staff</h1>

        <!-- Tombol full width di mobile -->
        <a href="{{ route('guru.create') }}"
           class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg text-center text-sm sm:text-base transition">
            + Tambah Guru
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded mb-4 text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    {{-- ===== MOBILE: LIST CARD (visible on sm and below) ===== --}}
    <div class="space-y-3 md:hidden">
        @forelse ($teachers as $teacher)
            <div class="bg-white shadow rounded-lg p-3 flex items-start gap-3">
                <div class="flex-shrink-0">
                    @if($teacher->photo)
                        <img src="{{ asset('storage/'.$teacher->photo) }}"
                             alt="{{ $teacher->name }}"
                             class="w-14 h-14 rounded-full object-cover">
                    @else
                        <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                            -
                        </div>
                    @endif
                </div>

                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="font-semibold text-gray-800 text-sm">{{ $teacher->name }}</div>
                            <div class="text-xs text-gray-500">{{ $teacher->position }}</div>
                            <div class="text-xs text-gray-500">{{ $teacher->subject ?? '-' }}</div>
                        </div>
                    </div>

                    <div class="mt-3 grid grid-cols-2 gap-2">
                        <a href="{{ route('guru.edit', $teacher->id) }}"
                           class="block text-center px-2 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs font-medium">
                           Edit
                        </a>

                        <form action="{{ route('guru.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full text-center px-2 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white shadow rounded-lg p-4 text-center text-gray-500">Belum ada data guru</div>
        @endforelse
    </div>

    {{-- ===== DESKTOP / TABLET: regular table (hidden on mobile) ===== --}}
    <div class="hidden md:block bg-white shadow rounded-lg overflow-hidden">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full text-sm border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-3 text-left">Foto</th>
                        <th class="border px-4 py-3 text-left">Nama</th>
                        <th class="border px-4 py-3 text-left">Jabatan</th>
                        <th class="border px-4 py-3 text-left">Mapel</th>
                        <th class="border px-4 py-3 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="border px-4 py-3 w-24">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/'.$teacher->photo) }}" alt="{{ $teacher->name }}"
                                         class="w-14 h-14 rounded-full object-cover">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="border px-4 py-3 align-middle">{{ $teacher->name }}</td>
                            <td class="border px-4 py-3 align-middle">{{ $teacher->position }}</td>
                            <td class="border px-4 py-3 align-middle">{{ $teacher->subject ?? '-' }}</td>
                            <td class="border px-4 py-3 text-center align-middle">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('guru.edit', $teacher->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1.5 rounded text-sm font-medium transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('guru.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
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
                            <td colspan="5" class="text-center p-6 text-gray-500">Belum ada data guru</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

  </div>
</div>  
@endsection

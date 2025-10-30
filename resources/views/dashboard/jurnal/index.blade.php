@extends('layouts.dashboard')

@section('title', 'Laporan Jurnal')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Daftar Laporan Jurnal</h2>
    <a href="{{ route('jurnals.create') }}" 
       class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        + Tambah Jurnal
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border-collapse border">
    <thead class="bg-indigo-600 text-white">
        <tr>
            <th class="border p-2">Judul</th>
            <th class="border p-2">Catatan Sementara</th>
            <th class="border p-2">Tanggal</th>
            <th class="border p-2 w-40">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jurnals as $jurnal)
        <tr class="hover:bg-gray-50">
            <td class="border p-2">{{ $jurnal->judul }}</td>
            <td class="border p-2">{{ $jurnal->penulis ?? '-' }}</td>
            <td class="border p-2">{{ \Carbon\Carbon::parse($jurnal->tanggal)->format('d M Y') }}</td>
            <td class="border p-2 flex gap-2">
                <a href="{{ route('jurnals.edit', $jurnal) }}" 
                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('jurnals.destroy', $jurnal) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center p-4 text-gray-500">Belum ada jurnal</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $jurnals->links() }}
</div>
@endsection

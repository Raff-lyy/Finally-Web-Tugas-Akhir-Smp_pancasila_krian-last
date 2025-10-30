@extends('layouts.dashboard')

@section('title', 'Tambah Jurnal')

@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Laporan Jurnal</h2>

<form action="{{ route('jurnals.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-medium">Judul</label>
        <input type="text" name="judul" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block font-medium">Isi</label>
        <textarea name="isi" rows="5" class="w-full border p-2 rounded" required></textarea>
    </div>
    <div>
        <label class="block font-medium">Penulis</label>
        <input type="text" name="penulis" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-medium">Tanggal</label>
        <input type="date" name="tanggal" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Simpan
    </button>
</form>
@endsection

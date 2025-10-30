@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Guru</h1>

    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block">Nama</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block">Jabatan</label>
            <input type="text" name="position" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block">Mata Pelajaran</label>
            <input type="text" name="subject" class="border p-2 w-full">
        </div>

        <div>
            <label class="block">Foto</label>
            <input type="file" name="photo" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('guru.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection

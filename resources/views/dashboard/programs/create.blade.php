@extends('layouts.dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Program</h2>

    <form action="{{ route('dashboard.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="desc" rows="4" class="w-full border p-2 rounded" required>{{ old('desc') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Gambar</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Simpan
        </button>
        <a href="{{ route('dashboard.programs.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
            Batal
        </a>
    </form>
</div>
@endsection

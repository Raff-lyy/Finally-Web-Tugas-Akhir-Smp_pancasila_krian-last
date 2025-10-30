@extends('layouts.dashboard')

@section('title', 'Tambah Berita')

@section('content')
<h2 class="text-xl font-bold mb-6">Tambah Berita</h2>

@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">Judul</label>
        <input type="text" name="title" value="{{ old('title') }}"
               class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-semibold">Konten</label>
        <textarea name="content" rows="6" class="w-full border rounded p-2" required>{{ old('content') }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Gambar (opsional)</label>
        <input type="file" name="image" class="w-full border rounded p-2">
    </div>

    <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Simpan
    </button>
    <a href="{{ route('berita.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
</form>
@endsection

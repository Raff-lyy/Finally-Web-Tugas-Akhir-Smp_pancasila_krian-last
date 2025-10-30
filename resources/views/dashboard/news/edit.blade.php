@extends('layouts.dashboard')

@section('title', 'Edit Berita')

@section('content')
<h2 class="text-xl font-bold mb-6">Edit Berita</h2>

@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Judul</label>
        <input type="text" name="title" value="{{ old('title', $berita->title) }}"
               class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-semibold">Konten</label>
        <textarea name="content" rows="6" class="w-full border rounded p-2" required>{{ old('content', $berita->content) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Gambar (opsional)</label>
        @if($berita->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $berita->image) }}" 
                     alt="{{ $berita->title }}" 
                     class="h-32 rounded shadow border">
            </div>
        @endif
        <input type="file" name="image" class="w-full border rounded p-2">
    </div>

    <div class="flex items-center gap-2">
        <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Update
        </button>
        <a href="{{ route('berita.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </div>
</form>
@endsection

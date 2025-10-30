@extends('layouts.dashboard')
@section('title', 'Edit Hero')
@section('content')
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <h2 class="text-xl sm:text-2xl font-bold mb-4">Edit Hero: {{ $hero->slug }}</h2>

    <form action="{{ route('dashboard.hero.update', $hero) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Slug (readonly) -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug" class="w-full p-2 border rounded bg-gray-100" value="{{ $hero->slug }}" readonly>
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="title" class="w-full p-2 border rounded" value="{{ old('title', $hero->title) }}">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Subtitle -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Subjudul</label>
            <textarea name="subtitle" class="w-full p-2 border rounded">{{ old('subtitle', $hero->subtitle) }}</textarea>
            @error('subtitle') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Button Texts -->
        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-2">
            <div>
                <label class="block mb-1 font-medium">Teks Tombol 1</label>
                <input type="text" name="button_1_text" class="w-full p-2 border rounded" value="{{ old('button_1_text', $hero->button_1_text) }}">
                @error('button_1_text') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Teks Tombol 2</label>
                <input type="text" name="button_2_text" class="w-full p-2 border rounded" value="{{ old('button_2_text', $hero->button_2_text) }}">
                @error('button_2_text') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Background Image -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Background Image</label>
            <input type="file" name="background_image" class="w-full p-2 border rounded">
            @if($hero->background_image)
                <img src="{{ asset('storage/'.$hero->background_image) }}" class="mt-2 h-24 w-auto rounded">
            @endif
            @error('background_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Stats -->
        @php
            $stats = $hero->stats ?? ['students'=>0,'teachers'=>0,'programs'=>0,'years'=>0];
        @endphp
        <div class="mb-4 grid grid-cols-2 md:grid-cols-4 gap-2">
            <div>
                <label class="block mb-1 font-medium">Siswa Aktif</label>
                <input type="number" name="stats[students]" class="w-full p-2 border rounded" value="{{ old('stats.students', $stats['students']) }}">
            </div>
            <div>
                <label class="block mb-1 font-medium">Guru Berpengalaman</label>
                <input type="number" name="stats[teachers]" class="w-full p-2 border rounded" value="{{ old('stats.teachers', $stats['teachers']) }}">
            </div>
            <div>
                <label class="block mb-1 font-medium">Program Unggulan</label>
                <input type="number" name="stats[programs]" class="w-full p-2 border rounded" value="{{ old('stats.programs', $stats['programs']) }}">
            </div>
            <div>
                <label class="block mb-1 font-medium">Tahun Berpengalaman</label>
                <input type="number" name="stats[years]" class="w-full p-2 border rounded" value="{{ old('stats.years', $stats['years']) }}">
            </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Simpan
            </button>
            <a href="{{ route('dashboard.hero.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection

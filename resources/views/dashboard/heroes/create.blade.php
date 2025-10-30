@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Hero</h1>

    <form action="{{ route('heroes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Subtitle</label>
            <input type="text" name="subtitle" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded" required></textarea>
        </div>

        <div>
            <label class="block font-medium">Button 1 Text</label>
            <input type="text" name="button_1_text" class="w-full border px-3 py-2 rounded">
            <label class="block font-medium mt-2">Button 1 Link</label>
            <input type="text" name="button_1_link" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-medium">Button 2 Text</label>
            <input type="text" name="button_2_text" class="w-full border px-3 py-2 rounded">
            <label class="block font-medium mt-2">Button 2 Link</label>
            <input type="text" name="button_2_link" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Jumlah Siswa</label>
                <input type="number" name="students" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Jumlah Guru</label>
                <input type="number" name="teachers" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Program Unggulan</label>
                <input type="number" name="programs" class="w-full border px-3 py-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Tahun Pengalaman</label>
                <input type="number" name="experience" class="w-full border px-3 py-2 rounded">
            </div>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection

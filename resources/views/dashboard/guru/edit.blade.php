@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Guru</h1>

    <form action="{{ route('guru.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Nama</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block">Jabatan</label>
            <input type="text" name="position" value="{{ $teacher->position }}" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block">Mata Pelajaran</label>
            <input type="text" name="subject" value="{{ $teacher->subject }}" class="border p-2 w-full">
        </div>

        <div>
            <label class="block">Foto</label>
            <input type="file" name="photo" class="border p-2 w-full">
            @if($teacher->photo)
                <img src="{{ asset('storage/'.$teacher->photo) }}" class="w-24 h-24 mt-2 rounded">
            @endif
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

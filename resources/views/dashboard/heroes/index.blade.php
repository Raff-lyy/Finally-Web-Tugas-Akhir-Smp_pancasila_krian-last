@extends('layouts.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Hero Section</h1>

    <a href="{{ route('heroes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg mb-4 inline-block">
        + Tambah Hero
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Subjudul</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($heroes as $hero)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $hero->title }}</td>
                    <td class="border px-4 py-2">{{ $hero->subtitle }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('heroes.edit', $hero->id) }}" class="bg-blue-600 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('heroes.destroy', $hero->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

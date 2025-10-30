@extends('layouts.dashboard')
@section('title', 'Manajemen Hero')
@section('content')
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <h2 class="text-xl sm:text-2xl font-bold mb-4">Hero Section</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-indigo-600 text-white text-sm sm:text-base">
                <tr>
                    <th class="p-2 sm:p-3 text-left border">Slug</th>
                    <th class="p-2 sm:p-3 text-left border">Judul</th>
                    <th class="p-2 sm:p-3 text-left border">Preview</th>
                    <th class="p-2 sm:p-3 text-left border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm sm:text-base">
                @forelse($heroes as $hero)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 sm:p-3 border">{{ $hero->slug }}</td>
                        <td class="p-2 sm:p-3 border">{{ $hero->title }}</td>
                        <td class="p-2 sm:p-3 border">
                            @if($hero->background_image)
                                <img src="{{ asset('storage/'.$hero->background_image) }}" 
                                     alt="Preview {{ $hero->title }}" 
                                     class="h-20 w-auto rounded shadow-sm">
                            @else
                                <span class="text-gray-400 text-sm">Tidak ada</span>
                            @endif
                        </td>
                        <td class="p-2 sm:p-3 border flex gap-2">
                            <a href="{{ route('dashboard.hero.edit', $hero) }}" 
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4 text-gray-500">Belum ada hero</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

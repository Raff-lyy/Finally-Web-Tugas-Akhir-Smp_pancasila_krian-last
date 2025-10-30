@extends('layouts.dashboard')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="bg-white p-4 sm:p-6 rounded-xl shadow">
    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-4 gap-3">
        <h2 class="text-xl sm:text-2xl font-bold">Manajemen Program</h2>
        <a href="{{ route('dashboard.programs.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm sm:text-base text-center">
            + Tambah Program
        </a>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="overflow-x-auto border border-gray-200 rounded-lg">
        <table class="min-w-full border-collapse text-sm sm:text-base">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="p-2 sm:p-3 text-left border">Judul</th>
                    <th class="p-2 sm:p-3 text-left border">Deskripsi</th>
                    <th class="p-2 sm:p-3 text-left border">Gambar</th>
                    <th class="p-2 sm:p-3 text-left border w-40 sm:w-48">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($programs as $p)
                <tr class="hover:bg-gray-50">
                    <td class="p-2 sm:p-3 border">{{ $p->title }}</td>
                    <td class="p-2 sm:p-3 border">{{ Str::limit($p->desc, 60) }}</td>
                    <td class="p-2 sm:p-3 border">
                        @if($p->image)
                            <img src="{{ asset('storage/'.$p->image) }}" class="w-16 h-16 object-cover rounded-lg">
                        @else
                            <span class="text-gray-500 text-xs">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="p-2 sm:p-3 border flex flex-col sm:flex-row gap-2 sm:space-x-2">
                        <a href="{{ route('dashboard.programs.edit', $p) }}" 
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm text-center">Edit</a>
                        <form action="{{ route('dashboard.programs.destroy', $p) }}" method="POST" 
                              onsubmit="return confirm('Yakin hapus?')" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm w-full sm:w-auto">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada program</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

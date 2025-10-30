@extends('layouts.dashboard')

@section('title', 'Daftar User')

@section('content')
<div class="p-4 sm:p-6">

    <!-- Header -->
    <div class="p-4 sm:p-6 bg-white rounded-xl shadow">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <h2 class="text-lg sm:text-2xl font-bold text-gray-800">Daftar User</h2>

            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <a href="{{ route('dashboard') }}" 
                   class="w-full sm:w-auto px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-center text-sm sm:text-base font-medium transition">
                    ⬅️ Kembali
                </a>
                <a href="{{ route('dashboard.users.create') }}" 
                   class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-center text-sm sm:text-base font-medium transition">
                    + Tambah User
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        {{-- ===== MOBILE: CARD LIST (visible on sm and below) ===== --}}
        <div class="space-y-3 md:hidden">
            @forelse($users as $user)
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="flex flex-col gap-2">
                        <div>
                            <h3 class="font-semibold text-gray-800 text-sm leading-tight mb-1">{{ $user->name }}</h3>
                            <p class="text-xs text-gray-500 mb-1">{{ $user->email }}</p>
                            <p class="text-xs text-gray-500">Daftar: {{ $user->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <a href="{{ route('dashboard.users.edit', $user) }}"
                               class="block text-center px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs font-medium">
                                Edit
                            </a>

                            <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white shadow rounded-lg p-4 text-center text-gray-500">Belum ada user</div>
            @endforelse
        </div>

        {{-- ===== DESKTOP: TABLE VIEW ===== --}}
        <div class="hidden md:block bg-white shadow-md rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border-collapse">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="border border-indigo-500 p-3 text-left rounded-tl-lg">Nama</th>
                            <th class="border border-indigo-500 p-3 text-left">Email</th>
                            <th class="border border-indigo-500 p-3 text-left">Tanggal Daftar</th>
                            <th class="border border-indigo-500 p-3 text-center w-44 rounded-tr-lg">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="border p-3">{{ $user->name }}</td>
                                <td class="border p-3 break-words">{{ $user->email }}</td>
                                <td class="border p-3">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="border p-3 text-center">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('dashboard.users.edit', $user) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1.5 rounded text-sm font-medium transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded text-sm font-medium transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-6 text-gray-500">Belum ada user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection

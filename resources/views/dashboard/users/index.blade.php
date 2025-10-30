@extends('layouts.dashboard')

@section('title', 'Daftar User')

@section('content')
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-4 gap-3">
        <h2 class="text-xl sm:text-2xl font-bold">Daftar User</h2>
        
        <a href="{{ route('dashboard') }}" 
           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm sm:text-base text-center">
            ⬅️ Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    <!-- Wrapper untuk scroll horizontal di mobile -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-indigo-600 text-white text-sm sm:text-base">
                <tr>
                    <th class="p-2 sm:p-3 text-left border">Nama</th>
                    <th class="p-2 sm:p-3 text-left border">Email</th>
                    <th class="p-2 sm:p-3 text-left border">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm sm:text-base">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 sm:p-3 border">{{ $user->name }}</td>
                        <td class="p-2 sm:p-3 border break-words">{{ $user->email }}</td>
                        <td class="p-2 sm:p-3 border">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">Belum ada user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection

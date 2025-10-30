@extends('layouts.dashboard')

@section('title', 'Tambah User')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah User</h2>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('users.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">⬅ Kembali</a>
            <button type="submit" 
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection

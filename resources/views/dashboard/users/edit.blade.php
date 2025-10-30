@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('content')
<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <h2 class="text-xl sm:text-2xl font-bold mb-4">Edit User</h2>

    <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name', $user->name) }}">
            @error('name') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ old('email', $user->email) }}">
            @error('email') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Password <span class="text-gray-400">(Kosongkan jika tidak ingin diubah)</span></label>
            <input type="password" name="password" class="w-full p-2 border rounded">
            @error('password') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Simpan
            </button>

            <a href="{{ route('dashboard.users.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
               Batal
            </a>
        </div>
    </form>
</div>
@endsection

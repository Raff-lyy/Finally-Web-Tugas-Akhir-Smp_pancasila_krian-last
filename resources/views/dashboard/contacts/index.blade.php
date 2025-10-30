@extends('layouts.dashboard')

@section('content')
<div class="bg-white p-4 sm:p-6 rounded-xl shadow">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
        <h2 class="text-xl sm:text-2xl font-bold">Pesan Kontak</h2>
        <a href="{{ route('dashboard') }}" 
           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-center text-sm sm:text-base">
            ⬅️ Kembali
        </a>
    </div>

    @if ($contacts->isEmpty())
        <p class="text-gray-500 text-center py-6">Belum ada pesan masuk</p>
    @else
        <!-- Tabel versi desktop -->
        <div class="hidden md:block overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-full border-collapse text-sm">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="p-3 text-left border">Nama</th>
                        <th class="p-3 text-left border">Email</th>
                        <th class="p-3 text-left border">Telepon</th>
                        <th class="p-3 text-left border">Subjek</th>
                        <th class="p-3 text-left border">Pesan</th>
                        <th class="p-3 text-left border w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($contacts as $contact)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $contact->name }}</td>
                        <td class="p-3 border">{{ $contact->email }}</td>
                        <td class="p-3 border">{{ $contact->phone }}</td>
                        <td class="p-3 border">{{ $contact->subject }}</td>
                        <td class="p-3 border">{{ Str::limit($contact->message, 50) }}</td>
                        <td class="p-3 border">
                            <div class="flex gap-2">
                                <a href="{{ route('contacts.reply', $contact->id) }}" 
                                   class="text-blue-600 hover:underline">Balas</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Versi mobile (card view) -->
        <div class="grid gap-4 md:hidden">
            @foreach ($contacts as $contact)
            <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-gray-800">Nama:</span> {{ $contact->name }}
                </p>
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-gray-800">Email:</span> {{ $contact->email }}
                </p>
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-gray-800">Telepon:</span> {{ $contact->phone }}
                </p>
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-gray-800">Subjek:</span> {{ $contact->subject }}
                </p>
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-gray-800">Pesan:</span> {{ Str::limit($contact->message, 80) }}
                </p>

                <div class="flex justify-between items-center mt-3">
                    <a href="{{ route('contacts.reply', $contact->id) }}" 
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Balas
                    </a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

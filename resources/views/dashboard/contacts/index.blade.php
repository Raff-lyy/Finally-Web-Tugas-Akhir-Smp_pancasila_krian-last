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

    <!-- ================= DESKTOP TABLE ================= -->
    <div class="hidden md:block overflow-x-auto border border-gray-200 rounded-lg">
        <table class="min-w-full border-collapse text-sm">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="p-3 border text-left">Nama</th>
                    <th class="p-3 border text-left">Email</th>
                    <th class="p-3 border text-left">Telepon</th>
                    <th class="p-3 border text-left">Subjek</th>
                    <th class="p-3 border text-left">Pesan</th>
                    <th class="p-3 border w-48">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($contacts as $contact)
                @php
                    // ===== FIX NOMOR WHATSAPP =====
                    $wa = preg_replace('/[^0-9]/', '', $contact->phone);
                    if (str_starts_with($wa, '0')) {
                        $wa = '62' . substr($wa, 1);
                    }
                @endphp
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $contact->name }}</td>
                    <td class="p-3 border">{{ $contact->email }}</td>
                    <td class="p-3 border">{{ $contact->phone }}</td>
                    <td class="p-3 border">{{ $contact->subject }}</td>
                    <td class="p-3 border">{{ Str::limit($contact->message, 60) }}</td>
                    <td class="p-3 border">
                        <div class="flex gap-2 flex-wrap">

                            <!-- GMAIL -->
                            <a target="_blank"
                               href="mailto:{{ $contact->email }}?subject={{ urlencode('Balasan: '.$contact->subject) }}&body={{ urlencode(
                                   "Halo {$contact->name},\n\n".
                                   "Terima kasih telah menghubungi SMP Pancasila.\n\n".
                                   "Pesan Anda:\n{$contact->message}\n\n"
                               ) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">
                                Gmail
                            </a>

                            <!-- WHATSAPP (ANTI 404) -->
                            <a target="_blank"
                               href="https://wa.me/{{ $wa }}?text={{ urlencode(
                                   "Halo {$contact->name}, kami dari SMP Pancasila.\n\n".
                                   "Menanggapi pesan Anda:\n{$contact->message}"
                               ) }}"
                               class="px-3 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700">
                                WhatsApp
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">
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

    <!-- ================= MOBILE CARD ================= -->
    <div class="grid gap-4 md:hidden">
        @foreach ($contacts as $contact)
        @php
            $wa = preg_replace('/[^0-9]/', '', $contact->phone);
            if (str_starts_with($wa, '0')) {
                $wa = '62' . substr($wa, 1);
            }
        @endphp
        <div class="border border-gray-200 rounded-lg p-4 shadow-sm">
            <p class="text-sm"><b>Nama:</b> {{ $contact->name }}</p>
            <p class="text-sm"><b>Email:</b> {{ $contact->email }}</p>
            <p class="text-sm"><b>Telepon:</b> {{ $contact->phone }}</p>
            <p class="text-sm"><b>Subjek:</b> {{ $contact->subject }}</p>
            <p class="text-sm"><b>Pesan:</b> {{ Str::limit($contact->message, 100) }}</p>

            <div class="flex gap-2 mt-3">

                <a target="_blank"
                   href="mailto:{{ $contact->email }}?subject={{ urlencode('Balasan: '.$contact->subject) }}&body={{ urlencode($contact->message) }}"
                   class="flex-1 bg-blue-600 text-white py-2 rounded text-xs text-center">
                    Gmail
                </a>

                <a target="_blank"
                   href="https://wa.me/{{ $wa }}?text={{ urlencode($contact->message) }}"
                   class="flex-1 bg-green-600 text-white py-2 rounded text-xs text-center">
                    WhatsApp
                </a>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="flex-1 bg-red-600 text-white py-2 rounded text-xs px-3">
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

@extends('layouts.app') {{-- ganti dengan layout umummu kalau ada --}}

@section('title', 'Berita SMP Pancasila Krian')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8">Berita & Kegiatan</h1>

    @if($news->count())
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($news as $item)
                <div class="bg-white rounded-xl shadow hover:shadow-lg overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="h-48 w-full object-cover">
                    @else
                        <div class="h-48 flex items-center justify-center bg-gray-100 text-gray-500">
                            Tidak ada gambar
                        </div>
                    @endif
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">
                            <a href="{{ route('berita.public.show', $item->slug) }}" class="hover:text-primary-600">
                                {{ $item->title }}
                            </a>
                        </h2>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            {{ Str::limit(strip_tags($item->content), 100) }}
                        </p>
                        <a href="{{ route('berita.public.show', $item->slug) }}" class="text-primary-600 text-sm font-medium mt-3 inline-block">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $news->links() }}
        </div>
    @else
        <p class="text-gray-600">Belum ada berita.</p>
    @endif
</div>
@endsection

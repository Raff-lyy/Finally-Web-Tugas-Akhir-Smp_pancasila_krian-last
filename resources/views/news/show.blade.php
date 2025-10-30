@extends('layouts.app')

@section('title', $berita->title)

@section('content')
<div class="bg-gray-100 py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Judul -->
        <h1 class="text-3xl md:text-5xl font-extrabold mb-10 leading-tight text-gray-900 text-center">
            {{ $berita->title }}
        </h1>

        <!-- Kontainer dengan background transparan -->
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-6 md:p-10">
            
            <!-- Gambar -->
            @if($berita->image)
                <div class="mb-8">
                    <img src="{{ asset('storage/'.$berita->image) }}" 
                         alt="{{ $berita->title }}" 
                         class="w-full h-auto max-h-[500px] object-cover rounded-xl shadow-md">
                </div>
            @endif

            <!-- Konten -->
            <div class="prose prose-lg max-w-none text-justify leading-relaxed text-gray-800">
                {!! $berita->content !!}
            </div>
        </div>
    </div>
</div>
@endsection

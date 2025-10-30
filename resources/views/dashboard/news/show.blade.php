{{-- resources/views/news/show.blade.php --}}
@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $news->title }}</h1>
    <p class="text-sm text-gray-500 mb-6">
        Dipublikasikan pada {{ $news->created_at->format('d M Y') }}
    </p>

    @if($news->image)
        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full rounded-lg mb-6">
    @endif

    <div class="prose max-w-none">
        {!! nl2br(e($news->content)) !!}
    </div>

    <div class="mt-8">
        <a href="{{ route('home') }}" class="text-primary-600 hover:underline">
            ← Kembali ke Berita
        </a>
    </div>
</div>
@endsection

@extends('layouts.dashboard')
@section('title','About Section')
@section('content')

@php
$about = \App\Models\About::where('slug','about-home')->first();
@endphp

<div class="p-4 sm:p-6 bg-white rounded-xl shadow">
    <h2 class="text-xl sm:text-2xl font-bold mb-4">About Section</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    @if($about)
        <div class="mb-4">
            <h3 class="font-semibold text-gray-800 mb-2">{{ $about->title }}</h3>
            <p class="text-gray-600">{{ Str::limit($about->subtitle,100) }}</p>
        </div>
        <a href="{{ route('dashboard.about.edit',$about) }}" 
           class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit About</a>
    @else
        <div class="text-gray-500">Belum ada About dengan slug "about-home"</div>
    @endif
</div>

@endsection

@extends('layouts.app')

@section('title', 'Program Sekolah')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Ekstrakulikuler</h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($programs as $program)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                   <img src="{{ asset('storage/'.$program->image) }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $program['title'] }}</h3>
                        <p class="text-gray-600">{{ $program['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

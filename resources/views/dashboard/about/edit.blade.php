@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.about.update', $about) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title & Subtitle -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $about->title) }}" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Subtitle</label>
            <textarea name="subtitle" class="w-full border p-2 rounded">{{ old('subtitle', $about->subtitle) }}</textarea>
        </div>

        <!-- Visi -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Visi</label>
            <textarea name="visi" class="w-full border p-2 rounded">{{ old('visi', $about->visi) }}</textarea>
        </div>

        <!-- Misi -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Misi</label>
            <div id="misi-container">
                @php $misi = json_decode($about->misi) ?? []; @endphp
                @foreach($misi as $item)
                    <div class="flex mb-2">
                        <input type="text" name="misi[]" value="{{ $item }}" class="w-full border p-2 rounded mr-2">
                        <button type="button" onclick="this.parentNode.remove()" class="bg-red-500 text-white px-3 rounded">X</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addMisi()" class="bg-blue-500 text-white px-3 rounded mt-2">Tambah Misi</button>
        </div>

        <!-- Values -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Values (Title & Description)</label>
            <div id="values-container">
                @php $values = json_decode($about->values) ?? []; @endphp
                @foreach($values as $value)
                    <div class="flex mb-2 gap-2">
                        <input type="text" name="values[][title]" value="{{ $value->title }}" placeholder="Title" class="border p-2 rounded w-1/3">
                        <input type="text" name="values[][desc]" value="{{ $value->desc }}" placeholder="Description" class="border p-2 rounded w-2/3">
                        <button type="button" onclick="this.parentNode.remove()" class="bg-red-500 text-white px-3 rounded">X</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addValue()" class="bg-blue-500 text-white px-3 rounded mt-2">Tambah Value</button>
        </div>

        <!-- Stats -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Stats (Value & Label)</label>
            <div id="stats-container">
                @php $stats = json_decode($about->stats) ?? []; @endphp
                @foreach($stats as $stat)
                    <div class="flex mb-2 gap-2">
                        <input type="text" name="stats[][value]" value="{{ $stat->value }}" placeholder="Value" class="border p-2 rounded w-1/2">
                        <input type="text" name="stats[][label]" value="{{ $stat->label }}" placeholder="Label" class="border p-2 rounded w-1/2">
                        <button type="button" onclick="this.parentNode.remove()" class="bg-red-500 text-white px-3 rounded">X</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addStat()" class="bg-blue-500 text-white px-3 rounded mt-2">Tambah Stat</button>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Gambar</label>
            <input type="file" name="image">
            @if($about->image)

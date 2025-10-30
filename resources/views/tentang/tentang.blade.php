{{-- resources/views/tentang/tentang.blade.php --}}
@extends('layouts.app') {{-- ini harus sesuai dengan layout utama kamu --}}

@section('content')
    <div class="animate-on-scroll">
        @include('components.about')
    </div>

    <div class="animate-on-scroll mt-8">
        @include('components.teachers')
    </div>
@endsection

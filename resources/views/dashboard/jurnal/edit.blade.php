@extends('layouts.dashboard')

@section('title', 'Edit Jurnal')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Laporan Jurnal</h2>

<form action="{{ route('jurnals.update', $jurnal) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block font-medium">Judul</label>
        <input type="text" name="judul" value="{{ $jurnal->judul }}" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block font-medium">Isi</label>
        <textarea id="editor" name="isi" rows="5" class="w-full border p-2 rounded" required>{{ $jurnal->isi }}</textarea>

    </div>
    <div>
        <label class="block font-medium">Penulis</label>
        <input type="text" name="penulis" value="{{ $jurnal->penulis }}" class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block font-medium">Tanggal</label>
        <input type="date" name="tanggal" value="{{ $jurnal->tanggal }}" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Update
    </button>
</form>

<script>
setInterval(function() {
    let formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('_method', 'PUT');
    formData.append('judul', document.querySelector('[name="judul"]').value);
    formData.append('isi', CKEDITOR.instances.editor.getData());
    formData.append('penulis', document.querySelector('[name="penulis"]').value);
    formData.append('tanggal', document.querySelector('[name="tanggal"]').value);

    fetch("{{ route('jurnals.update', $jurnal->id) }}", {
        method: "POST",
        body: formData
    });
}, 10000); // autosave tiap 10 detik

</script>

@endsection

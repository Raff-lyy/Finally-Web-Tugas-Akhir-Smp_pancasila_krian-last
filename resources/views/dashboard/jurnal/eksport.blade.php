<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $jurnal->judul }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; margin-bottom: 20px; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>{{ $jurnal->judul }}</h1>
    <p><strong>Penulis:</strong> {{ $jurnal->penulis }}</p>
    <div class="content">
        {!! $jurnal->isi !!}
    </div>
</body>
</html>

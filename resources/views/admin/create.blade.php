<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gift Romantis')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <h2>✨ Tambah Gift Baru</h2>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label>Judul 🎁</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label>Pesan 💬</label><textarea name="message" class="form-control"></textarea></div>
        <div class="mb-3"><label>Gambar 🖼️</label><input type="file" name="image" class="form-control"></div>
        <div class="mb-3"><label>Video 🎥</label><input type="file" name="video" class="form-control"></div>
        <div class="mb-3"><label>Musik 🎶</label><input type="file" name="music" class="form-control"></div>
        <button class="btn btn-pink text-white">Simpan</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<style>.btn-pink{background:#ff66b2;}</style>



@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gift Romantis')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>🎁 Daftar Gift Romantis</h2>
        <a href="{{ route('admin.create') }}" class="btn btn-pink">+ Tambah Gift</a>

        <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle text-center">
  <thead class="table-pink text-dark">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Pesan</th>
      <th>Gambar</th>
      <th>Video</th>
      <th>Musik</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($admin as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->title }}</td>
      <td>{{ Str::limit($item->message, 30) }}</td>

      {{-- Gambar --}}
      <td>
        @if ($item->image)
          <img src="{{ asset('storage/' . $item->image) }}" width="60">
        @else
          <span class="text-muted">-</span>
        @endif
      </td>

      {{-- Video --}}
      <td>
        @if ($item->video)
          <video width="120" controls>
            <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
            Browser Anda tidak mendukung video.
          </video>
        @else
          <span class="text-muted">-</span>
        @endif
      </td>

      {{-- Musik --}}
      <td>
        @if ($item->music)
          <audio controls>
            <source src="{{ asset('storage/' . $item->music) }}" type="audio/mpeg">
            Browser Anda tidak mendukung audio.
          </audio>
        @else
          <span class="text-muted">-</span>
        @endif
      </td>

      {{-- Aksi --}}
      <td>
        <a href="{{ route('admin.show', $item) }}" class="btn btn-info btn-sm">Lihat</a>
        <a href="{{ route('admin.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus gift ini?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<style>
.btn-pink { background-color:#ff66b2; }
.table-pink { background-color:hsl(300, 95%, 50%); }
</style>\

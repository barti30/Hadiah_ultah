
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h2>🎁 Detail Gift Romantis</h2>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <tr>
                    <th width="200">Judul</th>
                    <td>{{ $admin->title }}</td>
                </tr>
                <tr>
                    <th>Pesan</th>
                    <td>{{ $admin->message }}</td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td>
                        @if($admin->image)
                            <img src="{{ asset('storage/' . $admin->image) }}" width="200" class="rounded">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Video</th>
                    <td>
                        @if($admin->video)
                            <video width="300" controls>
                                <source src="{{ asset('storage/' . $admin->video) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutar video.
                            </video>
                        @else
                            <span class="text-muted">Tidak ada video</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Musik</th>
                    <td>
                        @if($admin->music)
                            <audio controls>
                                <source src="{{ asset('storage/' . $admin->music) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung pemutar audio.
                            </audio>
                        @else
                            <span class="text-muted">Tidak ada musik</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
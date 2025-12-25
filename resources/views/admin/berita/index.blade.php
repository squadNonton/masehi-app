@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Berita/Kegiatan</h4>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Berita
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="80">Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th width="60">Views</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $item)
                <tr>
                    <td>
                        @if($item->gambar)
                        <img src="{{ asset('img/berita/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-width: 60px;">
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        {{ Str::limit($item->judul, 40) }}
                        @if($item->is_featured)
                        <span class="badge bg-warning ms-1">Featured</span>
                        @endif
                    </td>
                    <td><span class="badge bg-info">{{ ucfirst($item->kategori) }}</span></td>
                    <td>{{ $item->tanggal->format('d M Y') }}</td>
                    <td>{{ $item->view_count }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.berita.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data berita</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Galeri</h4>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Galeri
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="100">Preview</th>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Kategori</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $item)
                <tr>
                    <td>
                        @if($item->tipe == 'foto' && $item->file_path)
                        <img src="{{ asset('img/galeri/' . $item->file_path) }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-width: 80px;">
                        @elseif($item->tipe == 'video')
                        <span class="badge bg-danger"><i class="fas fa-video me-1"></i>Video</span>
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($item->judul, 40) }}</td>
                    <td><span class="badge bg-{{ $item->tipe == 'foto' ? 'primary' : 'danger' }}">{{ ucfirst($item->tipe) }}</span></td>
                    <td>{{ ucfirst($item->kategori) }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.galeri.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus galeri ini?')">
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
                    <td colspan="6" class="text-center text-muted">Belum ada data galeri</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

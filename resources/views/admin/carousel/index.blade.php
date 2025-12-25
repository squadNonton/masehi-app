@extends('admin.layouts.app')

@section('title', 'Kelola Carousel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Carousel</h4>
    <a href="{{ route('admin.carousel.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Carousel
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="80">Urutan</th>
                    <th width="120">Gambar</th>
                    <th>Judul</th>
                    <th>Subjudul</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carousels as $carousel)
                <tr>
                    <td>{{ $carousel->urutan }}</td>
                    <td>
                        <img src="{{ asset('img/carousel/' . $carousel->gambar) }}" alt="{{ $carousel->judul }}" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td>{{ $carousel->judul }}</td>
                    <td>{{ Str::limit($carousel->subjudul, 50) }}</td>
                    <td>
                        @if($carousel->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.carousel.edit', $carousel) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.carousel.destroy', $carousel) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus carousel ini?')">
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
                    <td colspan="6" class="text-center text-muted">Belum ada data carousel</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

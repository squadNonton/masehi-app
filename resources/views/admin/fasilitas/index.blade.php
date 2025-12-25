@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Fasilitas</h4>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Fasilitas
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="80">Urutan</th>
                    <th width="100">Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fasilitas as $item)
                <tr>
                    <td>{{ $item->urutan }}</td>
                    <td>
                        @if($item->gambar)
                        <img src="{{ asset('img/fasilitas/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-thumbnail" style="max-width: 80px;">
                        @elseif($item->icon)
                        <i class="{{ $item->icon }} fa-2x text-primary"></i>
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.fasilitas.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.fasilitas.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus fasilitas ini?')">
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
                    <td colspan="6" class="text-center text-muted">Belum ada data fasilitas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

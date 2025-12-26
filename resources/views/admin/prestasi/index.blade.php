@extends('admin.layouts.app')

@section('title', 'Kelola Prestasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Prestasi</h4>
    <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Prestasi
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tingkat</th>
                    <th>Kategori</th>
                    <th>Peringkat</th>
                    <th>Tahun</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasi as $item)
                <tr>
                    <td>{{ Str::limit($item->judul, 40) }}</td>
                    <td><span class="badge bg-info">{{ ucfirst($item->tingkat) }}</span></td>
                    <td>{{ ucfirst($item->kategori) }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $item->peringkat }}</span></td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.prestasi.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus prestasi ini?')">
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
                    <td colspan="7" class="text-center text-muted">Belum ada data prestasi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

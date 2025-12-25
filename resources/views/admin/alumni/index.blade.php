@extends('admin.layouts.app')

@section('title', 'Kelola Alumni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Alumni</h4>
    <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Alumni
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="80">Foto</th>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Pekerjaan</th>
                    <th width="80">Status</th>
                    <th width="80">Featured</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumni as $item)
                <tr>
                    <td>
                        @if($item->foto)
                        <img src="{{ asset('img/alumni/' . $item->foto) }}" alt="{{ $item->nama }}" class="img-thumbnail" style="max-width: 60px;">
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>{{ $item->pekerjaan ?? '-' }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_featured)
                            <span class="badge bg-warning">Featured</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.alumni.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.alumni.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus alumni ini?')">
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
                    <td colspan="7" class="text-center text-muted">Belum ada data alumni</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

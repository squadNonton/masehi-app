@extends('admin.layouts.app')

@section('title', 'Kelola Karya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Karya Siswa</h4>
    <a href="{{ route('admin.karya.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Karya
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
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Tahun</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karya as $item)
                <tr>
                    <td>
                        @if($item->gambar)
                        <img src="{{ asset('img/karya/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-width: 60px;">
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($item->judul, 30) }}</td>
                    <td><span class="badge bg-info">{{ ucfirst($item->kategori) }}</span></td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.karya.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.karya.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus karya ini?')">
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
                    <td colspan="8" class="text-center text-muted">Belum ada data karya</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

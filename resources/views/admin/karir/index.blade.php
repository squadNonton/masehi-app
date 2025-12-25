@extends('admin.layouts.app')

@section('title', 'Kelola Karir')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Lowongan Kerja</h4>
    <a href="{{ route('admin.karir.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Lowongan
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Tipe</th>
                    <th>Batas Lamaran</th>
                    <th width="80">Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karir as $item)
                <tr>
                    <td>{{ $item->judul_posisi }}</td>
                    <td><span class="badge bg-info">{{ ucfirst($item->tipe) }}</span></td>
                    <td>
                        {{ $item->batas_lamaran->format('d M Y') }}
                        @if($item->batas_lamaran->isPast())
                        <span class="badge bg-danger ms-1">Expired</span>
                        @elseif($item->batas_lamaran->diffInDays(now()) <= 7)
                        <span class="badge bg-warning ms-1">Segera</span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.karir.edit', $item) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.karir.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus lowongan ini?')">
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
                    <td colspan="5" class="text-center text-muted">Belum ada data lowongan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

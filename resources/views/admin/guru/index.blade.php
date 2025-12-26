@extends('admin.layouts.app')

@section('title', 'Kelola Guru')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Guru</h4>
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Guru
    </a>
</div>

<div class="row">
    @forelse($gurus as $guru)
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                @if($guru->foto)
                <img src="{{ asset('img/guru/' . $guru->foto) }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                @else
                <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                    <i class="fas fa-user fa-2x text-white"></i>
                </div>
                @endif
                <h5 class="card-title mb-1">{{ $guru->nama }}</h5>
                <p class="text-muted small mb-2">{{ $guru->jabatan }}</p>
                <div class="mb-2">
                    @if($guru->facebook)<a href="{{ $guru->facebook }}" class="text-primary me-1"><i class="fab fa-facebook"></i></a>@endif
                    @if($guru->twitter)<a href="{{ $guru->twitter }}" class="text-info me-1"><i class="fab fa-twitter"></i></a>@endif
                    @if($guru->instagram)<a href="{{ $guru->instagram }}" class="text-danger"><i class="fab fa-instagram"></i></a>@endif
                </div>
                <span class="badge {{ $guru->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $guru->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>
            <div class="card-footer bg-white">
                <a href="{{ route('admin.guru.edit', $guru) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Belum ada data guru</div>
    </div>
    @endforelse
</div>
@endsection

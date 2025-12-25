@extends('admin.layouts.app')

@section('title', 'Edit Alumni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Alumni</h4>
    <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.alumni.update', $alumni) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $alumni->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                    <input type="number" name="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}" min="1964" max="{{ date('Y') }}" required>
                    @error('tahun_lulus')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $alumni->pekerjaan) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control" value="{{ old('perusahaan', $alumni->perusahaan) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Universitas</label>
                    <input type="text" name="universitas" class="form-control" value="{{ old('universitas', $alumni->universitas) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $alumni->urutan) }}" min="0">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Testimoni</label>
                    <textarea name="testimoni" class="form-control" rows="3">{{ old('testimoni', $alumni->testimoni) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Foto</label>
                    @if($alumni->foto)
                    <div class="mb-2">
                        <img src="{{ asset('img/alumni/' . $alumni->foto) }}" alt="{{ $alumni->nama }}" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                    @endif
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $alumni->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" {{ $alumni->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured (Tampil di halaman utama)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update
            </button>
        </form>
    </div>
</div>
@endsection

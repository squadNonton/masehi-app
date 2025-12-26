@extends('admin.layouts.app')

@section('title', 'Edit Lowongan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Lowongan Kerja</h4>
    <a href="{{ route('admin.karir.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.karir.update', $karir) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul Posisi <span class="text-danger">*</span></label>
                    <input type="text" name="judul_posisi" class="form-control @error('judul_posisi') is-invalid @enderror" value="{{ old('judul_posisi', $karir->judul_posisi) }}" required>
                    @error('judul_posisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                        <option value="">Pilih Tipe</option>
                        <option value="full-time" {{ old('tipe', $karir->tipe) == 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ old('tipe', $karir->tipe) == 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="kontrak" {{ old('tipe', $karir->tipe) == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                    </select>
                    @error('tipe')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $karir->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Persyaratan <span class="text-danger">*</span></label>
                    <textarea name="persyaratan" class="form-control @error('persyaratan') is-invalid @enderror" rows="4" required>{{ old('persyaratan', $karir->persyaratan) }}</textarea>
                    @error('persyaratan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Benefit</label>
                    <textarea name="benefit" class="form-control" rows="3">{{ old('benefit', $karir->benefit) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Batas Lamaran <span class="text-danger">*</span></label>
                    <input type="date" name="batas_lamaran" class="form-control @error('batas_lamaran') is-invalid @enderror" value="{{ old('batas_lamaran', $karir->batas_lamaran->format('Y-m-d')) }}" required>
                    @error('batas_lamaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $karir->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
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

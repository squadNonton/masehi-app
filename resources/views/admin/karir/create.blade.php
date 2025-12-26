@extends('admin.layouts.app')

@section('title', 'Tambah Lowongan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Tambah Lowongan Kerja</h4>
    <a href="{{ route('admin.karir.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.karir.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul Posisi <span class="text-danger">*</span></label>
                    <input type="text" name="judul_posisi" class="form-control @error('judul_posisi') is-invalid @enderror" value="{{ old('judul_posisi') }}" placeholder="Contoh: Guru Matematika" required>
                    @error('judul_posisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                        <option value="">Pilih Tipe</option>
                        <option value="full-time" {{ old('tipe') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ old('tipe') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="kontrak" {{ old('tipe') == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                    </select>
                    @error('tipe')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Persyaratan <span class="text-danger">*</span></label>
                    <textarea name="persyaratan" class="form-control @error('persyaratan') is-invalid @enderror" rows="4" placeholder="Masukkan setiap persyaratan di baris baru" required>{{ old('persyaratan') }}</textarea>
                    @error('persyaratan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Benefit</label>
                    <textarea name="benefit" class="form-control" rows="3" placeholder="Masukkan setiap benefit di baris baru">{{ old('benefit') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Batas Lamaran <span class="text-danger">*</span></label>
                    <input type="date" name="batas_lamaran" class="form-control @error('batas_lamaran') is-invalid @enderror" value="{{ old('batas_lamaran') }}" required>
                    @error('batas_lamaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Simpan
            </button>
        </form>
    </div>
</div>
@endsection

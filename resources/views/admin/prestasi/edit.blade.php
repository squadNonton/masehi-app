@extends('admin.layouts.app')

@section('title', 'Edit Prestasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Prestasi</h4>
    <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Judul Prestasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $prestasi->judul) }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tingkat <span class="text-danger">*</span></label>
                    <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror" required>
                        <option value="">Pilih Tingkat</option>
                        <option value="kota" {{ old('tingkat', $prestasi->tingkat) == 'kota' ? 'selected' : '' }}>Kota/Kabupaten</option>
                        <option value="provinsi" {{ old('tingkat', $prestasi->tingkat) == 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="nasional" {{ old('tingkat', $prestasi->tingkat) == 'nasional' ? 'selected' : '' }}>Nasional</option>
                        <option value="internasional" {{ old('tingkat', $prestasi->tingkat) == 'internasional' ? 'selected' : '' }}>Internasional</option>
                    </select>
                    @error('tingkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="akademik" {{ old('kategori', $prestasi->kategori) == 'akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="olahraga" {{ old('kategori', $prestasi->kategori) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="seni" {{ old('kategori', $prestasi->kategori) == 'seni' ? 'selected' : '' }}>Seni</option>
                        <option value="robotik" {{ old('kategori', $prestasi->kategori) == 'robotik' ? 'selected' : '' }}>Robotik/Teknologi</option>
                        <option value="lainnya" {{ old('kategori', $prestasi->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Peringkat <span class="text-danger">*</span></label>
                    <select name="peringkat" class="form-select @error('peringkat') is-invalid @enderror" required>
                        <option value="">Pilih Peringkat</option>
                        <option value="Juara 1" {{ old('peringkat', $prestasi->peringkat) == 'Juara 1' ? 'selected' : '' }}>Juara 1</option>
                        <option value="Juara 2" {{ old('peringkat', $prestasi->peringkat) == 'Juara 2' ? 'selected' : '' }}>Juara 2</option>
                        <option value="Juara 3" {{ old('peringkat', $prestasi->peringkat) == 'Juara 3' ? 'selected' : '' }}>Juara 3</option>
                        <option value="Harapan 1" {{ old('peringkat', $prestasi->peringkat) == 'Harapan 1' ? 'selected' : '' }}>Harapan 1</option>
                        <option value="Harapan 2" {{ old('peringkat', $prestasi->peringkat) == 'Harapan 2' ? 'selected' : '' }}>Harapan 2</option>
                        <option value="Finalis" {{ old('peringkat', $prestasi->peringkat) == 'Finalis' ? 'selected' : '' }}>Finalis</option>
                        <option value="Peserta" {{ old('peringkat', $prestasi->peringkat) == 'Peserta' ? 'selected' : '' }}>Peserta</option>
                    </select>
                    @error('peringkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta', $prestasi->nama_peserta) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $prestasi->tahun) }}" min="2000" max="{{ date('Y') }}" required>
                    @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $prestasi->tanggal?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar/Foto</label>
                    @if($prestasi->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('img/prestasi/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $prestasi->is_active ? 'checked' : '' }}>
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

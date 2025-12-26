@extends('admin.layouts.app')

@section('title', 'Edit Karya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Karya Siswa</h4>
    <a href="{{ route('admin.karya.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.karya.update', $karya) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul Karya <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $karya->judul) }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="tulisan" {{ old('kategori', $karya->kategori) == 'tulisan' ? 'selected' : '' }}>Tulisan/Essay</option>
                        <option value="seni" {{ old('kategori', $karya->kategori) == 'seni' ? 'selected' : '' }}>Seni Rupa</option>
                        <option value="project" {{ old('kategori', $karya->kategori) == 'project' ? 'selected' : '' }}>Project</option>
                        <option value="video" {{ old('kategori', $karya->kategori) == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', $karya->nama_siswa) }}" required>
                    @error('nama_siswa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kelas <span class="text-danger">*</span></label>
                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $karya->kelas) }}" required>
                    @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $karya->tahun) }}" required>
                    @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $karya->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    @if($karya->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('img/karya/' . $karya->gambar) }}" alt="{{ $karya->judul }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">File (PDF/DOC)</label>
                    @if($karya->file)
                    <div class="mb-2">
                        <a href="{{ asset('files/karya/' . $karya->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-file me-1"></i>Lihat File
                        </a>
                    </div>
                    @endif
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept=".pdf,.doc,.docx">
                    @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $karya->is_active ? 'checked' : '' }}>
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

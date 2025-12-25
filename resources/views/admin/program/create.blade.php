@extends('admin.layouts.app')

@section('title', 'Tambah Program')

@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-edit me-2"></i>Form Input</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="input-judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Badge</label>
                        <input type="text" name="badge" id="input-badge" class="form-control" value="{{ old('badge') }}" placeholder="First, Second, Third...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="input-deskripsi" class="form-control summernote @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Detail</label>
                        <input type="text" name="link_detail" class="form-control" value="{{ old('link_detail') }}">
                    </div>

                    <h6 class="mt-4 mb-3">Detail Items</h6>
                    <div id="items-container">
                        <div class="row mb-2 item-row">
                            <div class="col-md-5">
                                <input type="text" name="items[0][judul]" class="form-control item-judul" placeholder="Nama Item">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="items[0][icon]" class="form-control item-icon" placeholder="Icon (fa fa-icon)">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-item" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>

                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="gambar" id="input-gambar" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.program.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Live Preview Panel -->
    <div class="col-lg-5">
        <div class="card shadow-sm sticky-top" style="top: 20px;">
            <div class="card-header bg-dark text-white">
                <h6 class="mb-0"><i class="fas fa-eye me-2"></i>Live Preview</h6>
            </div>
            <div class="card-body">
                <div class="courses-item bg-light rounded overflow-hidden">
                    <div class="text-center p-4 pt-3">
                        <div class="d-inline-block bg-primary text-white fs-6 py-1 px-3 mb-3" id="preview-badge">Badge</div>
                        <h5 class="mb-3" id="preview-judul">Judul Program</h5>
                        <div id="preview-deskripsi" class="small text-muted mb-3">Deskripsi akan muncul di sini...</div>
                        <div id="preview-items" class="text-start">
                            <div class="d-flex align-items-center mb-2 small">
                                <i class="fa fa-check-circle text-primary me-2"></i>
                                <span>Item akan muncul di sini</span>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img id="preview-gambar" src="{{ asset('img/placeholder.png') }}" class="w-100" style="height: 150px; object-fit: cover; background: #ddd;" onerror="this.style.background='#ddd'">
                        <div class="position-absolute bottom-0 end-0 m-2">
                            <span class="btn btn-outline-primary btn-sm">Read More</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <small class="text-muted"><i class="fas fa-info-circle me-1"></i>Preview akan update otomatis saat Anda mengetik</small>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let itemIndex = 1;

$(document).ready(function() {
    // Preview updates
    $('#input-judul').on('input', function() {
        $('#preview-judul').text($(this).val() || 'Judul Program');
    });

    $('#input-badge').on('input', function() {
        $('#preview-badge').text($(this).val() || 'Badge');
    });

    $('#input-deskripsi').on('summernote.change', function(we, contents) {
        $('#preview-deskripsi').html(contents || 'Deskripsi akan muncul di sini...');
    });

    $('#input-gambar').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // Update items preview
    function updateItemsPreview() {
        var html = '';
        $('.item-row').each(function() {
            var judul = $(this).find('.item-judul').val();
            var icon = $(this).find('.item-icon').val() || 'fa fa-check-circle';
            if (judul) {
                html += '<div class="d-flex align-items-center mb-2 small"><i class="' + icon + ' text-primary me-2"></i><span>' + judul + '</span></div>';
            }
        });
        $('#preview-items').html(html || '<div class="d-flex align-items-center mb-2 small"><i class="fa fa-check-circle text-primary me-2"></i><span>Item akan muncul di sini</span></div>');
    }

    $(document).on('input', '.item-judul, .item-icon', updateItemsPreview);

    // Add item
    $('#add-item').on('click', function() {
        var html = `
            <div class="row mb-2 item-row">
                <div class="col-md-5">
                    <input type="text" name="items[${itemIndex}][judul]" class="form-control item-judul" placeholder="Nama Item">
                </div>
                <div class="col-md-5">
                    <input type="text" name="items[${itemIndex}][icon]" class="form-control item-icon" placeholder="Icon (fa fa-icon)">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-times"></i></button>
                </div>
            </div>
        `;
        $('#items-container').append(html);
        itemIndex++;
    });

    // Remove item
    $(document).on('click', '.remove-item', function() {
        $(this).closest('.item-row').remove();
        updateItemsPreview();
    });
});
</script>
@endpush
@endsection

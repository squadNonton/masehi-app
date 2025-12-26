@extends('admin.layouts.app')

@section('title', 'Data Pendaftaran')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Pendaftaran Siswa Baru</h5>
        <span class="badge bg-primary">{{ $pendaftarans->count() }} Total</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Lengkap</th>
                        <th>Email Akun</th>
                        <th>TTL</th>
                        <th>Asal Sekolah</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftarans as $p)
                    <tr>
                        <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                        <td><strong>{{ $p->nama_lengkap }}</strong></td>
                        <td>{{ $p->email_akun }}</td>
                        <td>
                            {{ $p->tempat_lahir }}, {{ $p->tgl_lahir ? $p->tgl_lahir->format('d/m/Y') : '-' }}
                        </td>
                        <td>{{ $p->sekolah_asal_smp ?? '-' }}</td>
                        <td>
                            @if($p->file_foto_siswa)
                                <a href="{{ asset('uploads/pendaftaran/'.$p->file_foto_siswa) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <!-- Edit/Detail (using public step 2 for simplicity as it allows editing) -->
                                <a href="{{ route('pendaftaran.step2', $p->id) }}" target="_blank" class="btn btn-sm btn-info text-white" title="Lihat/Edit Detail">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <form action="{{ route('admin.pendaftaran.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data pendaftaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

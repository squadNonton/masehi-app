@extends('admin.layouts.app')

@section('title', 'Data Pendaftaran')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Pendaftaran Siswa Baru</h5>
        <span class="badge bg-warning">{{ $pendaftarans->where('status', 'pending')->count() }} Pending</span>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Siswa</th>
                    <th>NISN</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftarans as $p)
                <tr>
                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                    <td>
                        <strong>{{ $p->nama_siswa }}</strong>
                        <br><small class="text-muted">{{ $p->email_ortu }}</small>
                    </td>
                    <td>{{ $p->nisn }}</td>
                    <td>{{ $p->asal_sekolah }}</td>
                    <td><span class="badge bg-info">{{ $p->jurusan }}</span></td>
                    <td>
                        @if($p->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($p->status == 'review')
                            <span class="badge bg-info">Review</span>
                        @elseif($p->status == 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Ubah Status
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('admin.pendaftaran.updateStatus', $p->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="review">
                                        <button type="submit" class="dropdown-item">Review</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.pendaftaran.updateStatus', $p->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="diterima">
                                        <button type="submit" class="dropdown-item text-success">Diterima</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.pendaftaran.updateStatus', $p->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" class="dropdown-item text-danger">Ditolak</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data pendaftaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

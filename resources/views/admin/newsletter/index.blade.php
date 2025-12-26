@extends('admin.layouts.app')

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Subscriber Newsletter</h5>
        <span class="badge bg-success">{{ $newsletters->count() }} Total Subscriber</span>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Email</th>
                    <th>Tanggal Subscribe</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($newsletters as $index => $newsletter)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <i class="fas fa-envelope text-primary me-2"></i>
                        {{ $newsletter->email }}
                    </td>
                    <td>{{ $newsletter->created_at ? $newsletter->created_at->format('d M Y H:i') : '-' }}</td>
                    <td>
                        @if($newsletter->is_active)
                        <span class="badge bg-success">Aktif</span>
                        @else
                        <span class="badge bg-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada subscriber</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<h2>Pengelolaan Data Skema Sertifikasi</h2>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<!-- Tombol Tambah Skema HANYA muncul jika login sebagai ADMIN -->
@if(Auth::user()->role === 'admin')
<div style="margin-bottom: 20px;">
    <a href="{{ route('skema.create') }}" class="btn btn-success">+ Tambah Skema Baru</a>
</div>
@endif

<table>
    <thead>
        <tr>
            <th>Kode Skema</th>
            <th>Nama Skema</th>
            <th>Jenis</th>
            <th>Jumlah Unit</th>
            <!-- Kolom header Aksi HANYA muncul untuk ADMIN -->
            @if(Auth::user()->role === 'admin')
                <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($skemas as $s)
        <tr>
            <td data-label="Kode Skema">{{ $s->kode_skema }}</td>
            <td data-label="Nama Skema">{{ $s->nama_skema }}</td>
            <td data-label="Jenis">{{ $s->jenis }}</td>
            <td data-label="Jumlah Unit">{{ $s->jumlah_unit }} Unit</td>
            
            <!-- Kolom data Aksi HANYA muncul jika login sebagai ADMIN -->
            @if(Auth::user()->role === 'admin')
            <td data-label="Aksi">
                <form action="{{ route('skema.destroy', $s->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="padding: 4px 8px;" onclick="return confirm('Hapus skema? Semua peserta terkait akan ikut terhapus.')">Hapus</button>
                </form>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <!-- Colspan otomatis menyesuaikan jumlah kolom berdasarkan role -->
            <td colspan="{{ Auth::user()->role === 'admin' ? 5 : 4 }}" style="text-align: center;">Belum ada data skema.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

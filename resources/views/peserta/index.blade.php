@extends('layouts.app')
@section('content')
<h2>Pengelolaan Data Peserta</h2>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<!-- Bagian Atas: Tombol Tambah Terpisah & Search Bar -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; gap: 15px; flex-wrap: wrap;">
    <!-- Tombol Tambah HANYA muncul jika login sebagai ADMIN -->
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('peserta.create') }}" class="btn btn-success">+ Tambah Peserta Baru</a>
    @else
        <div></div> <!-- Spacer polos agar search bar tetap di kanan jika tombol tambah hilang -->
    @endif
    
    <form action="{{ route('peserta.index') }}" method="GET" style="display: flex; gap: 8px; width: 100%; max-width: 400px;">
        <input type="text" name="search" placeholder="Cari nama atau NIK peserta..." class="form-control" value="{{ request('search') }}">
        <button type="submit" class="btn">Cari</button>
        @if(request('search'))
            <a href="{{ route('peserta.index') }}" class="btn" style="background: #7f8c8d; text-align: center;">Reset</a>
        @endif
    </form>
</div>

<!-- Tabel Data -->
<table>
    <thead>
        <tr><th>NIK</th><th>Nama</th><th>Skema</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @forelse($pesertas as $p)
        <tr>
            <td data-label="NIK">{{ $p->nik }}</td>
            <td data-label="Nama">{{ $p->nama_peserta }}</td>
            <td data-label="Skema">{{ $p->skema->nama_skema }}</td>
            <td data-label="Aksi">
                <!-- Semua Role (Admin & User) BISA melihat Detail -->
                <a href="{{ route('peserta.show', $p->id) }}" class="btn" style="padding: 4px 8px;">Detail</a>
                
                <!-- Tombol Ubah dan Hapus HANYA muncul jika login sebagai ADMIN -->
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('peserta.edit', $p->id) }}" class="btn" style="padding: 4px 8px; background: #f39c12;">Ubah</a>
                    <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 4px 8px;" onclick="return confirm('Hapus data peserta ini?')">Hapus</button>
                    </form>
                @endif
            </td>
        </tr>
        @empty
        <tr><td colspan="4" style="text-align: center;">Data peserta tidak ditemukan atau masih kosong.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection

@extends('layouts.app')

@section('content')
<h2>Dashboard Utama</h2>
<p>Selamat datang di Aplikasi Pengelolaan Sertifikasi, <strong>{{ Auth::user()->name }}</strong>.</p>

<!-- Bungkus kotak statistik agar HANYA muncul untuk ADMIN -->
@if(Auth::user()->role === 'admin')
<div style="display: flex; gap: 20px; margin-top: 20px;">
    <div class="card" style="flex: 1; background: #3498db; color: white;">
        <h3>Total Peserta</h3>
        <p style="font-size: 32px; font-weight: bold;">{{ $total_peserta ?? 0 }}</p>
    </div>
    <div class="card" style="flex: 1; background: #2ecc71; color: white;">
        <h3>Skema Sertifikasi</h3>
        <p style="font-size: 32px; font-weight: bold;">{{ $total_skema ?? 0 }}</p>
    </div>
</div>
@else
<!-- Tampilan isi dashboard yang ramah dan polos khusus untuk USER BIASA -->
<div class="card" style="margin-top: 20px; padding: 20px; background: #fff; border: 1px solid #ccc; border-radius: 4px;">
    <h3>Portal Informasi Sertifikasi</h3>
    <p style="margin-top: 10px; line-height: 1.6; color: #555;">
        Anda login sebagai Pengguna Umum. Silakan gunakan menu di sidebar sebelah kiri untuk melihat daftar data peserta yang terdaftar serta skema sertifikasi kompetensi aktif yang tersedia di LSP.
    </p>
</div>
@endif

@endsection

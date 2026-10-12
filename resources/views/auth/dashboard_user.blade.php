@extends('layouts.app')

@section('content')
<h2>Portal Dashboard Pengguna (User)</h2>
<p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Anda login sebagai Pengguna Umum.</p>

<div class="card" style="margin-top: 20px; padding: 20px; background: #fff; border: 1px solid #ccc; border-radius: 4px;">
    <h3>Informasi Panduan Sertifikasi</h3>
    <p style="margin-top: 10px; line-height: 1.6;">
        Sebagai user biasa, Anda hanya memiliki hak akses untuk melihat informasi halaman utama ini. 
        Anda tidak memiliki wewenang untuk menambah, mengubah, melihat detail, ataupun menghapus 
        data pada sistem pengelolaan sertifikasi admin.
    </p>
</div>
@endsection

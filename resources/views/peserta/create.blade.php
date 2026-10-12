@extends('layouts.app')
@section('content')
<h2>Tambah Peserta Baru</h2>
<div class="card" style="max-width: 600px;">
    <form action="{{ route('peserta.store') }}" method="POST">
        @csrf
        <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" required></div>
        <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_peserta" class="form-control" required></div>
        <div class="form-group"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="form-group"><label>Nomor HP</label><input type="text" name="no_hp" class="form-control" required></div>
        <div class="form-group">
            <label>Pilihan Skema Sertifikasi</label>
            <select name="skema_id" class="form-control" required>
                <option value="">-- Pilih Skema --</option>
                @foreach($skemas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_skema }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan Peserta</button>
        <a href="{{ route('peserta.index') }}" class="btn" style="background: #7f8c8d;">Batal</a>
    </form>
</div>
@endsection

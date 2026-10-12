@extends('layouts.app')
@section('content')
<h2>Tambah Skema Baru</h2>
<div class="card" style="max-width: 600px;">
    <form action="{{ route('skema.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Skema</label>
            <input type="text" name="kode_skema" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Skema Sertifikasi</label>
            <input type="text" name="nama_skema" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Skema</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="KKNI">KKNI</option>
                <option value="Okupasi">Okupasi</option>
                <option value="Klaster">Klaster</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah Unit Kompetensi</label>
            <input type="number" name="jumlah_unit" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Skema</button>
        <a href="{{ route('skema.index') }}" class="btn" style="background: #7f8c8d;">Batal</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<h2>Ubah Data Peserta</h2>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $peserta->nik }}" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_peserta" class="form-control" value="{{ $peserta->nama_peserta }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $peserta->email }}" required>
        </div>
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $peserta->no_hp }}" required>
        </div>
        <div class="form-group">
            <label>Pilihan Skema Sertifikasi</label>
            <select name="skema_id" class="form-control" required>
                @foreach($skemas as $s)
                    <option value="{{ $s->id }}" {{ $peserta->skema_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_skema }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Perbarui Data</button>
        <a href="{{ route('peserta.index') }}" class="btn" style="background: #7f8c8d;">Batal</a>
    </form>
</div>
@endsection

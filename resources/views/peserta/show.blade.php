@extends('layouts.app')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('peserta.index') }}" class="btn" style="background: #7f8c8d;">← Kembali ke Daftar</a>
</div>

<h2>Detail Informasi Peserta Sertifikasi</h2>

<div class="card" style="max-width: 600px; padding: 30px;">
    <table style="width: 100%; border: none;">
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; width: 40%; padding: 12px 0; text-align: left;">Nomor Induk Kependudukan (NIK)</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->nik }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Nama Lengkap Peserta</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->nama_peserta }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Alamat Email</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->email }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Nomor WhatsApp / HP</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->no_hp }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Skema yang Diikuti</td>
            <td style="text-align: left; padding: 12px 0;">: <strong>{{ $peserta->skema->nama_skema }}</strong></td>
        </tr>
        <tr style="border-bottom: 1px solid #eee;">
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Kode Skema</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->skema->kode_skema }}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; padding: 12px 0; text-align: left;">Jenis Skema / Jumlah Unit</td>
            <td style="text-align: left; padding: 12px 0;">: {{ $peserta->skema->jenis }} / {{ $peserta->skema->jumlah_unit }} Unit</td>
        </tr>
    </table>
</div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Portal Sertifikasi LSP</title>
    <style>
        /* CSS NATIVE STANDAR & POLOS (RESPONSIVE) */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; line-height: 1.6; padding: 20px 0; }
        
        .container { max-width: 900px; margin: 0 auto; padding: 20px; }
        
        /* Header / Banner Utama */
        .welcome-header { background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 40px 20px; text-align: center; margin-bottom: 25px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .welcome-header h1 { font-size: 28px; color: #2c3e50; margin-bottom: 10px; }
        .welcome-header p { color: #666; font-size: 16px; margin-bottom: 25px; }
        
        /* Tombol Akses */
        .btn-group { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; }
        .btn { display: inline-block; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 15px; border: none; cursor: pointer; transition: background 0.2s; }
        .btn-primary { background-color: #0056b3; color: white; }
        .btn-primary:hover { background-color: #004085; }
        .btn-secondary { background-color: #2ecc71; color: white; }
        .btn-secondary:hover { background-color: #27ae60; }

        /* Section Informasi Tambahan (Biar Ramai) */
        .grid-info { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 25px; }
        .info-card { background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .info-card h3 { color: #2c3e50; margin-bottom: 10px; font-size: 18px; border-bottom: 2px solid #0056b3; display: inline-block; padding-bottom: 4px; }
        .info-card ul { list-style-position: inside; margin-top: 10px; color: #555; }
        .info-card li { margin-bottom: 8px; font-size: 14px; }

        /* Banner Statistik Ringkas */
        .stats-bar { background-color: #34495e; color: white; border-radius: 8px; padding: 20px; display: flex; justify-content: space-around; text-align: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px; }
        .stat-item h4 { font-size: 24px; color: #f1c40f; }
        .stat-item p { font-size: 13px; color: #bdc3c7; margin-top: 2px; }

        /* Footer */
        .welcome-footer { text-align: center; color: #777; font-size: 13px; margin-top: 40px; border-top: 1px solid #ddd; padding-top: 15px; }

        /* Responsive HP */
        @media (max-width: 600px) {
            .welcome-header h1 { font-size: 22px; }
            .stats-bar { flex-direction: column; }
        }
    </style>
</head>
<body>

    <div class="container">
        
        <!-- 1. BANNER UTAMA SELAMAT DATANG -->
        <div class="welcome-header">
            <h1>Sistem Informasi Sertifikasi Profesi</h1>
            <p>Portal Resmi Pengelolaan Data Skema & Pendaftaran Peserta Asesmen LSP</p>
            
            <div class="btn-group">
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk Portal Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Daftar Akun Baru</a>
            </div>
        </div>

        <!-- 2. STATISTIK RINGKAS SISTEM (Membuat Terlihat Ramai & Interaktif) -->
        <div class="stats-bar">
            <div class="stat-item">
                <h4>Aktif</h4>
                <p>Status Sistem Keamanan</p>
            </div>
            <div class="stat-item">
                <h4>Multi-Role</h4>
                <p>Hak Akses Admin & User</p>
            </div>
            <div class="stat-item">
                <h4>Responsive</h4>
                <p>Mendukung Desktop & Mobile</p>
            </div>
        </div>

        <!-- 3. KONTEN DETAIL FITUR & ALUR (Sederhana tapi padat informasi) -->
        <div class="grid-info">
            <!-- Box 1: Fitur Utama Sistem -->
            <div class="info-card">
                <h3>Fitur Utama Aplikasi</h3>
                <ul>
                    <li><strong>Autentikasi Aman:</strong> Pembatasan hak akses berbasis <em>Role Checking</em>.</li>
                    <li><strong>Manajemen Skema:</strong> Pengelolaan data paket kompetensi keahlian.</li>
                    <li><strong>Manajemen Peserta:</strong> Fitur CRUD lengkap beserta detail data asesi.</li>
                    <li><strong>Pencarian Cepat:</strong> Filter data peserta berdasarkan Nama atau NIK.</li>
                </ul>
            </div>

            <!-- Box 2: Alur Penggunaan -->
            <div class="info-card">
                <h3>Alur Sertifikasi</h3>
                <ul>
                    <li><strong>Registrasi:</strong> Peserta melakukan pendaftaran akun secara mandiri.</li>
                    <li><strong>Verifikasi:</strong> Administrator mengelola berkas data di dashboard admin.</li>
                    <li><strong>Sinkronisasi Database:</strong> Relasi otomatis antara data peserta dengan skema.</li>
                    <li><strong>Hasil Cetak/Detail:</strong> Dokumen ringkasan profil asesi siap ditinjau.</li>
                </ul>
            </div>
        </div>

        <!-- 4. FOOTER INFORMASI UJIAN -->
        <div class="welcome-footer">
            <p>Uji Kompetensi Keahlian (UKK) &copy; 2026 — Skema Okupasi Junior Web Developer</p>
            <p style="margin-top: 5px; font-size: 11px; color: #999;">Dibuat menggunakan Framework Laravel & CSS Native</p>
        </div>

    </div>

</body>
</html>

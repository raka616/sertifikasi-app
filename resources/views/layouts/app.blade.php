<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sertifikasi</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; }
        body { background: #f5f7fa; color: #333; display: flex; min-height: 100vh; flex-direction: column; }
        
        /* Navbar */
        .navbar { background: #2c3e50; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: white; text-decoration: none; font-weight: bold; }
        .nav-links a { margin-left: 15px; font-weight: 500; }

        /* Main Layout */
        .main-container { display: flex; flex: 1; }
        .sidebar { width: 240px; background: #34495e; color: white; padding: 20px 10px; }
        .sidebar a { display: block; color: #aecbfa; padding: 12px; text-decoration: none; border-radius: 4px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background: #2c3e50; color: white; }
        .content { flex: 1; padding: 30px; }

        /* Card & Utility */
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px; }
        h2 { margin-bottom: 20px; color: #2c3e50; }
        .btn { display: inline-block; padding: 8px 16px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-danger { background: #e74c3c; }
        .btn-success { background: #2ecc71; }
        
        /* Form & Tables */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-control { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .alert { padding: 12px; background: #e74c3c; color: white; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { background: #2ecc71; }

        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #2c3e50; color: white; }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container { flex-direction: column; }
            .sidebar { width: 100%; }
            table, tr, td, th { display: block; }
            th { display: none; }
            td { text-align: right; padding-left: 50%; position: relative; border-bottom: 1px solid #eee; }
            td::before { content: attr(data-label); position: absolute; left: 10px; font-weight: bold; text-align: left; }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Aplikasi Pengelolaan Sertifikasi</a>
        <div class="nav-links">
           @auth
    <span style="margin-right: 10px;">Halo, {{ Auth::user()->name }}</span>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #e74c3c;">Logout</a>
    
    <!-- PASTIKAN ADA @csrf DI DALAM TAG FORM DI BAWAH INI -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth

        </div>
    </div>

    <div class="main-container">
        <div class="sidebar">
            @auth
                @if(Auth::user()->role === 'admin')
                    <!-- Tampilan Menu untuk ADMIN -->
                    <a href="{{ route('dashboard') }}">Dashboard Admin</a>
                    <a href="{{ route('skema.index') }}">Data Skema</a>
                    <a href="{{ route('peserta.index') }}">Data Peserta</a>
                @else
                    <!-- Tampilan Menu untuk USER Biasa -->
                    <a href="{{ route('user.dashboard') }}">Dashboard User</a>
                    <a href="{{ route('skema.index') }}">Lihat Data Skema</a>
                    <a href="{{ route('peserta.index') }}">Lihat Data Peserta</a>
                @endif
            @endauth
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; }
        body { background: #f5f7fa; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .welcome-title { text-align: center; margin-bottom: 30px; color: #2c3e50; }
        .welcome-title h1 { font-size: 28px; margin-bottom: 5px; }
        .welcome-title p { color: #7f8c8d; font-size: 15px; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; width: 100%; max-width: 420px; }
        h3 { text-align: center; margin-bottom: 20px; color: #2c3e50; font-size: 18px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 14px; }
        .btn { display: block; width: 100%; padding: 10px; background: #3498db; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px; margin-top: 20px; }
        .btn:hover { background: #2980b9; }
        .alert { padding: 12px; background: #e74c3c; color: white; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
        .alert-success { background: #2ecc71; }
        .footer-link { text-align: center; margin-top: 20px; font-size: 14px; }
        .footer-link a { color: #3498db; text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>

<div>
    <div class="welcome-title">
        <h1>Selamat Datang!</h1>
        <p>Di Aplikasi Pengelolaan Data Peserta Sertifikasi LSP</p>
    </div>

    <div class="card">
        <h3>Login Administrator</h3>
        
        @if(session('success')) 
            <div class="alert alert-success">{{ session('success') }}</div> 
        @endif
        
        @if($errors->any()) 
            <div class="alert">{{ $errors->first() }}</div> 
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>
        
        <div class="footer-link">
            <p>Belum punya akun? <a href="{{ route('register') }}">Register di sini</a></p>
            <p style="margin-top: 10px;"><a href="{{ route('welcome') }}" style="color: #7f8c8d; font-size: 13px;">← Kembali ke Beranda</a></p>
        </div>
    </div>
</div>

</body>
</html>

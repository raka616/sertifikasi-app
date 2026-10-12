<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; }
        body { background: #f5f7fa; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; width: 100%; max-width: 420px; }
        h3 { text-align: center; margin-bottom: 20px; color: #2c3e50; font-size: 18px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-size: 14px; }
        .btn { display: block; width: 100%; padding: 10px; background: #2ecc71; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px; margin-top: 20px; }
        .btn:hover { background: #27ae60; }
        .alert { padding: 12px; background: #e74c3c; color: white; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
        .footer-link { text-align: center; margin-top: 20px; font-size: 14px; }
        .footer-link a { color: #3498db; text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>

<div class="card">
    <h3>Daftar Akun Baru</h3>
    
    @if($errors->any()) 
        <div class="alert">{{ $errors->first() }}</div> 
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn">Daftar</button>
    </form>
    
    <div class="footer-link">
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>
</div>

</body>
</html>

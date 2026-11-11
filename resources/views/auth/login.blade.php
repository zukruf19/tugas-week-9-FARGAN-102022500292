<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 340px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        .form-group input, .form-group select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-login { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .btn-login:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2 style="text-align: center; margin-bottom: 20px;">Login System</h2>
        <form action="/login" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Nama / Email Demo</label>
                <input type="text" name="email" value="fargan@gmail.com">
            </div>

            <div class="form-group">
                <label>Pilih Role Pengguna</label>
                <select name="role">
                    <option value="admin">Admin (CRUD Lengkap + Hapus)</option>
                    <option value="staff">Staff (CRU - Tanpa Hapus)</option>
                </select>
            </div>

            <button type="submit" class="btn-login">Langsung Masuk Web</button>
        </form>
    </div>
</body>
</html>
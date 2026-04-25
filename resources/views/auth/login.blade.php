<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | AHGO Stock</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    min-height: 100vh; display: flex; align-items: center; justify-content: center;
    background: #f0f2f5; color: #1a1a2e; font-family: 'Segoe UI', Arial, sans-serif;
  }
  .auth-card {
    width: 380px; max-width: calc(100vw - 32px); background: #fff;
    border-radius: 10px; box-shadow: 0 12px 32px rgba(0,0,0,0.12); overflow: hidden;
  }
  .auth-head { background: #16213e; color: #fff; padding: 18px 22px; }
  .auth-head h1 { font-size: 18px; letter-spacing: 0.5px; }
  .auth-body { padding: 22px; }
  .field { margin-bottom: 14px; }
  label { display: block; font-size: 12px; font-weight: 700; color: #555; margin-bottom: 5px; }
  input[type=email], input[type=password] {
    width: 100%; padding: 10px 11px; border: 1px solid #ddd; border-radius: 6px;
    font-size: 14px; outline: none;
  }
  input:focus { border-color: #3b82f6; }
  .remember { display: flex; gap: 8px; align-items: center; color: #555; font-size: 12px; margin-bottom: 16px; }
  .btn {
    width: 100%; border: none; border-radius: 6px; padding: 11px;
    background: #e94560; color: #fff; font-weight: 800; cursor: pointer;
  }
  .error { background: #f8d7da; color: #721c24; border-radius: 6px; padding: 10px; font-size: 12px; margin-bottom: 14px; }
  .setup { margin-top: 14px; text-align: center; font-size: 12px; }
  .setup a { color: #3b82f6; font-weight: 700; text-decoration: none; }
</style>
</head>
<body>
  <div class="auth-card">
    <div class="auth-head">
      <h1>AHGO Stock Login</h1>
    </div>
    <div class="auth-body">
      @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="field">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>
        <label class="remember">
          <input type="checkbox" name="remember" value="1">
          Remember me
        </label>
        <button class="btn" type="submit">Login</button>
      </form>

      <div class="setup">
        First time? <a href="{{ route('setup') }}">Create admin account</a>
      </div>
    </div>
  </div>
</body>
</html>

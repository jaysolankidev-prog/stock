<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Setup Admin | AHGO Stock</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    min-height: 100vh; display: flex; align-items: center; justify-content: center;
    background: #f0f2f5; color: #1a1a2e; font-family: 'Segoe UI', Arial, sans-serif;
  }
  .auth-card {
    width: 420px; max-width: calc(100vw - 32px); background: #fff;
    border-radius: 10px; box-shadow: 0 12px 32px rgba(0,0,0,0.12); overflow: hidden;
  }
  .auth-head { background: #16213e; color: #fff; padding: 18px 22px; }
  .auth-head h1 { font-size: 18px; letter-spacing: 0.5px; }
  .auth-head p { color: #b8c1d8; font-size: 12px; margin-top: 4px; }
  .auth-body { padding: 22px; }
  .field { margin-bottom: 14px; }
  label { display: block; font-size: 12px; font-weight: 700; color: #555; margin-bottom: 5px; }
  input {
    width: 100%; padding: 10px 11px; border: 1px solid #ddd; border-radius: 6px;
    font-size: 14px; outline: none;
  }
  input:focus { border-color: #3b82f6; }
  .btn {
    width: 100%; border: none; border-radius: 6px; padding: 11px;
    background: #e94560; color: #fff; font-weight: 800; cursor: pointer;
  }
  .error { background: #f8d7da; color: #721c24; border-radius: 6px; padding: 10px; font-size: 12px; margin-bottom: 14px; }
</style>
</head>
<body>
  <div class="auth-card">
    <div class="auth-head">
      <h1>Create Main Admin</h1>
      <p>This setup works only before the first user exists.</p>
    </div>
    <div class="auth-body">
      @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('setup.store') }}">
        @csrf
        <div class="field">
          <label>Name</label>
          <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="field">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>
        <div class="field">
          <label>Confirm Password</label>
          <input type="password" name="password_confirmation" required>
        </div>
        <button class="btn" type="submit">Create Admin</button>
      </form>
    </div>
  </div>
</body>
</html>

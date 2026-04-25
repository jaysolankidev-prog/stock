<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Members | AHGO Stock</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { background: #f0f2f5; color: #1a1a2e; font-family: 'Segoe UI', Arial, sans-serif; font-size: 13px; }
  .header {
    background: #16213e; color: #fff; padding: 14px 24px;
    display: flex; justify-content: space-between; align-items: center;
  }
  .header h1 { font-size: 18px; }
  .header-actions { display: flex; align-items: center; gap: 10px; }
  .link, .logout {
    border: none; border-radius: 6px; padding: 8px 12px; font-weight: 700;
    font-size: 12px; text-decoration: none; cursor: pointer;
  }
  .link { background: #3b82f6; color: #fff; }
  .logout { background: #e94560; color: #fff; }
  .page { padding: 18px; display: grid; grid-template-columns: 360px 1fr; gap: 16px; }
  .panel { background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); overflow: hidden; }
  .panel h2 { background: #fff; border-bottom: 1px solid #edf0f5; padding: 13px 16px; font-size: 14px; }
  .panel-body { padding: 16px; }
  .field { margin-bottom: 12px; }
  label { display: block; font-size: 12px; font-weight: 700; color: #555; margin-bottom: 5px; }
  input, select {
    width: 100%; padding: 9px 10px; border: 1px solid #ddd; border-radius: 6px;
    font-size: 13px; outline: none;
  }
  input:focus, select:focus { border-color: #3b82f6; }
  .btn { border: none; border-radius: 6px; background: #e94560; color: #fff; padding: 10px 14px; font-weight: 800; cursor: pointer; width: 100%; }
  table { width: 100%; border-collapse: collapse; }
  th { background: #f8f9fa; text-align: left; color: #555; font-size: 11px; text-transform: uppercase; padding: 9px 12px; }
  td { padding: 10px 12px; border-bottom: 1px solid #f0f0f0; }
  .role { display: inline-flex; border-radius: 4px; padding: 2px 8px; font-size: 11px; font-weight: 800; }
  .role-admin { background: #dbeafe; color: #1d4ed8; }
  .role-member { background: #dcfce7; color: #15803d; }
  .delete { border: none; background: none; color: #dc3545; font-weight: 800; cursor: pointer; }
  .message { margin-bottom: 12px; padding: 10px; border-radius: 6px; font-weight: 700; font-size: 12px; }
  .success { background: #d4edda; color: #155724; }
  .error { background: #f8d7da; color: #721c24; }
  .share-url { color: #555; font-size: 12px; margin-top: 12px; line-height: 1.5; }
  .share-url code { background: #f4f6f8; padding: 2px 5px; border-radius: 4px; color: #1a1a2e; }
  @media (max-width: 850px) { .page { grid-template-columns: 1fr; } }
</style>
</head>
<body>
  <div class="header">
    <h1>Members</h1>
    <div class="header-actions">
      <a class="link" href="{{ route('stock.index') }}">Stock</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="logout" type="submit">Logout</button>
      </form>
    </div>
  </div>

  <div class="page">
    <div class="panel">
      <h2>Add Member</h2>
      <div class="panel-body">
        @if(session('success'))
          <div class="message success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
          <div class="message error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('members.store') }}">
          @csrf
          <div class="field">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
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
          <div class="field">
            <label>Access</label>
            <select name="role" required>
              <option value="member" @selected(old('role') === 'member')>Member - view only</option>
              <option value="admin" @selected(old('role') === 'admin')>Admin - full access</option>
            </select>
          </div>
          <button class="btn" type="submit">Add Member</button>
        </form>

        <div class="share-url">
          Share this page URL with members after creating their login:<br>
          <code>{{ route('stock.member') }}</code>
        </div>
      </div>
    </div>

    <div class="panel">
      <h2>All Users</h2>
      <table>
        <thead>
          <tr><th>Name</th><th>Email</th><th>Access</th><th></th></tr>
        </thead>
        <tbody>
          @foreach($members as $member)
            <tr>
              <td><strong>{{ $member->name }}</strong></td>
              <td>{{ $member->email }}</td>
              <td><span class="role role-{{ $member->role }}">{{ strtoupper($member->role) }}</span></td>
              <td>
                @if(! $member->is(auth()->user()))
                  <form method="POST" action="{{ route('members.destroy', $member) }}" onsubmit="return confirm('Delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit">Delete</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

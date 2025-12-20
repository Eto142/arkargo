@include('admin.header')

<div class="main-content">

    <div class="page-header">
        <div>
            <h1>Change Password</h1>
            <p class="text-muted mb-0">Update your admin account password</p>
        </div>
    </div>

    <div class="stat-card">

        {{-- Alerts --}}
        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:10px;border-radius:5px;margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:5px;margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.change.password.post') }}" method="POST"
              style="display:flex;flex-direction:column;gap:15px;">
            @csrf

            <div>
                <label><strong>Current Password</strong></label>
                <input type="password" name="current_password" required
                       style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                @error('current_password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label><strong>New Password</strong></label>
                <input type="password" name="new_password" required
                       style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
                @error('new_password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label><strong>Confirm New Password</strong></label>
                <input type="password" name="new_password_confirmation" required
                       style="width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;">
            </div>

            <button type="submit"
                style="background:#007bff;color:white;padding:12px;border:none;border-radius:5px;font-size:16px;">
                Update Password
            </button>
        </form>

    </div>
</div>

@include('admin.footer')

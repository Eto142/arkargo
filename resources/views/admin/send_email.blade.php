@include('admin.header')



<!-- Main Content -->
<div class="main-content">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Send Email</h1>
            <p class="text-muted mb-0">Compose and send emails to customers or partners</p>
        </div>
    </div>

    <!-- Email Card -->
    <div class="stat-card">

      {{-- Success / Error Messages --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Email Form --}}
    <form action="{{ route('admin.send.email.post') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

        <div>
            <label style="font-weight: bold;">Recipient Email</label>
            <input type="email" name="to" value="{{ old('to') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('to')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label style="font-weight: bold;">Subject</label>
            <input type="text" name="subject" value="{{ old('subject') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('subject')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label style="font-weight: bold;">Message</label>
            <textarea name="message" rows="6" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: vertical;">{{ old('message') }}</textarea>
            @error('message')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label style="font-weight: bold;">Attachment (image or file)</label>
            <input type="file" name="attachment"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('attachment')
                <small style="color:red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit"
            style="background: #28a745; color: white; padding: 12px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
            Send Email
        </button>
    </form>

    </div>

    <!-- Sent Emails History -->
    <div class="stat-card" style="margin-top: 20px;">
        <h2 style="margin-bottom: 15px;">Sent Emails</h2>

        @forelse($sentEmails as $sentEmail)
            <div style="border-bottom: 1px solid #eee; padding: 12px 0;">
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 5px;">
                    <strong>{{ $sentEmail->subject }}</strong>
                    <span class="text-muted" style="font-size: 13px;">{{ $sentEmail->created_at->format('M d, Y h:i A') }}</span>
                </div>
                <div class="text-muted" style="font-size: 13px; margin-top: 2px;">To: {{ $sentEmail->to }}</div>
                <p style="margin-top: 8px; white-space: pre-line;">{{ $sentEmail->message }}</p>
                @if($sentEmail->attachment)
                    <a href="{{ asset('storage/' . $sentEmail->attachment) }}" target="_blank" style="font-size: 13px;">
                        📎 View attachment
                    </a>
                @endif
            </div>
        @empty
            <p class="text-muted mb-0">No emails sent yet.</p>
        @endforelse
    </div>

</div>

@include('admin.footer')
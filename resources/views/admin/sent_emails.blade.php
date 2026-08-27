@include('admin.header')

<!-- Main Content -->
<div class="main-content">

    <!-- Page Header -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <div>
            <h1>Sent Emails</h1>
            <p class="text-muted mb-0">History of emails sent from the admin panel</p>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.send.email') }}"
                style="background: #f0f0f0; color: #333; padding: 10px 16px; border-radius: 5px; text-decoration: none; font-size: 14px;">
                Send Email
            </a>
            @if($sentEmails->isNotEmpty())
                <form action="{{ route('admin.sent.emails.clear') }}" method="POST"
                    onsubmit="return confirm('Clear all sent email history? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        style="background: #dc3545; color: white; padding: 10px 16px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                        Clear All
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Sent Emails Card -->
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

        @forelse($sentEmails as $sentEmail)
            <div style="border-bottom: 1px solid #eee; padding: 12px 0;">
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 5px;">
                    <strong>{{ $sentEmail->subject }}</strong>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span class="text-muted" style="font-size: 13px;">{{ $sentEmail->created_at->format('M d, Y h:i A') }}</span>
                        <form action="{{ route('admin.sent.emails.destroy', $sentEmail) }}" method="POST"
                            onsubmit="return confirm('Delete this sent email record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background: none; border: none; color: #dc3545; cursor: pointer; font-size: 13px; padding: 0;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-muted" style="font-size: 13px; margin-top: 2px;">To: {{ $sentEmail->to }}</div>
                <p style="margin-top: 8px; white-space: pre-line;">{{ $sentEmail->message }}</p>

                @if($sentEmail->isImageAttachment())
                    <img src="{{ route('admin.sent.emails.attachment', $sentEmail) }}"
                        alt="{{ $sentEmail->attachment_name }}"
                        style="max-width: 200px; border-radius: 6px; margin-top: 8px;">
                @elseif($sentEmail->hasAttachment())
                    <a href="{{ route('admin.sent.emails.attachment', $sentEmail) }}" target="_blank" style="font-size: 13px;">
                        📎 {{ $sentEmail->attachment_name }}
                    </a>
                @endif
            </div>
        @empty
            <p class="text-muted mb-0">No emails sent yet.</p>
        @endforelse
    </div>

</div>

@include('admin.footer')

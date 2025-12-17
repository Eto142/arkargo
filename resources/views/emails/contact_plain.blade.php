<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $toUser ? 'Thank you for contacting Arkargo' : 'New Contact Message' }}</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; color: #333; }
        .email-wrapper { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background-color: #1a1a1a; color: #ffffff; padding: 20px; text-align: center; }
        .header img { max-width: 150px; margin-bottom: 10px; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { padding: 20px; }
        .body h2 { color: #1a1a1a; font-size: 18px; margin-bottom: 15px; }
        .body p { margin-bottom: 10px; line-height: 1.6; }
        .message-box { background-color: #f9f9f9; padding: 15px; border-left: 4px solid #1a1a1a; margin: 15px 0; }
        .footer { background-color: #f1f1f1; padding: 15px; font-size: 12px; text-align: center; color: #666; }
        a { color: #1a1a1a; text-decoration: none; }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header with logo -->
        <div class="header">
          <img src="{{ asset('logo.png') }}" alt="Arkargo Logo">
            <h1>{{ $toUser ? 'Thank You for Contacting Arkargo' : 'New Contact Form Submission' }}</h1>
        </div>

        <!-- Body -->
        <div class="body">
            @if($toUser)
                <h2>Hello {{ $data['name'] }},</h2>
                <p>Thank you for reaching out to Arkargo. We have received your message and will respond as soon as possible.</p>
                <p><strong>Your Message:</strong></p>
                <div class="message-box">{{ $data['message'] }}</div>
            @else
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> {{ $data['name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
                <p><strong>Message:</strong></p>
                <div class="message-box">{{ $data['message'] }}</div>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Arkargo. All rights reserved.<br>
            <a href="https://arkargo.org">www.arkargo.org</a>
        </div>
    </div>
</body>
</html>

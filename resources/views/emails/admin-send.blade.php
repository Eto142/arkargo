<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subjectLine ?? 'Notification' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0;">
    <div style="width: 100%; padding: 30px 0;">
        <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">

            <!-- Header with Logo Only -->
<div style="background: #1a73e8; padding: 20px; text-align: center;">
   <img 
  src="https://arkargo.org/logo.png"
  alt="Arkargo Official Logo"
  width="160"
  height="auto"
  style="display:block;margin:auto;"
>

</div>


            <!-- Body -->
            <div style="padding: 25px;">
                {{-- <h2 style="color: #333333; font-size: 20px; margin-bottom: 15px;">{{ $subjectLine }}</h2> --}}
                <p style="font-size: 15px; line-height: 1.6; color: #555555; margin-bottom: 15px;">
                    {!! nl2br(e($bodyMessage)) !!}
                </p>

                @if(!empty($attachmentData) && !empty($attachmentMime))
                    <div style="margin-top: 20px; text-align: center;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0 auto; max-width: 280px; width: 100%;">
                            <tr>
                                <td style="background: #f8f9fb; border: 1px solid #e6e8ec; border-radius: 10px; padding: 10px;">
                                    <img src="{{ $message->embedData($attachmentData, $attachmentName, $attachmentMime) }}"
                                         alt="{{ $attachmentName }}"
                                         width="260"
                                         style="width: 100%; max-width: 260px; height: auto; display: block; margin: 0 auto; border-radius: 6px;">
                                    @if($attachmentName)
                                        <p style="margin: 8px 0 0; font-size: 12px; color: #999999; word-break: break-all;">{{ $attachmentName }}</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                @elseif(!empty($attachmentName))
                    <p style="font-size: 13px; color: #777777;">📎 Attached: {{ $attachmentName }}</p>
                @endif
            </div>

            <!-- Footer -->
            <div style="background: #f8f8f8; padding: 15px; text-align: center; font-size: 12px; color: #777777;">
                &copy; {{ date('Y') }} Arkargo. All rights reserved.
            </div>

        </div>
    </div>
</body>
</html>

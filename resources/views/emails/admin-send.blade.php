<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subjectLine ?? 'Notification' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0;">
    <div style="width: 100%; padding: 30px 0;">
        <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">

            <!-- Header with Logo -->
            <div style="background: #1a73e8; padding: 20px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="vertical-align: middle; width: 60px;">
                            <div style="width: 50px; height: 50px; background: #330d8cff; text-align: center; line-height: 50px; font-size: 22px; font-weight: bold; color: #fff; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">
                                G
                            </div>
                        </td>
                        <td style="vertical-align: middle; color: #ffffff;">
                            <div style="font-size: 18px; font-weight: bold; letter-spacing: 1px;">GETNOW<span style="color:#ffd700;">PAY</span></div>
                            <div style="font-size: 12px; letter-spacing: 0.5px;"></div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Body -->
            <div style="padding: 25px;">
                <h2 style="color: #333333; font-size: 20px; margin-bottom: 15px;">{{ $subjectLine }}</h2>
                <p style="font-size: 15px; line-height: 1.6; color: #555555; margin-bottom: 15px;">
                    {!! nl2br(e($bodyMessage)) !!}
                </p>
            </div>

            <!-- Footer -->
            <div style="background: #f8f8f8; padding: 15px; text-align: center; font-size: 12px; color: #777777;">
                &copy; {{ date('Y') }} Getnowpay. All rights reserved.
            </div>

        </div>
    </div>
</body>
</html>

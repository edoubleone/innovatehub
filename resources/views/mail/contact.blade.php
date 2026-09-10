<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body style="margin:0;padding:0;background:#f5f5f5;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;color:#1a1a1a">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f5f5;padding:40px 16px">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e5e5e5">

                    {{-- Header --}}
                    <tr>
                        <td style="background:#1d4ed8;padding:32px 40px">
                            <p style="margin:0;font-size:20px;font-weight:700;color:#ffffff;letter-spacing:-0.02em">Innovate Hub</p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:40px 40px 32px">
                            <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                Incoming message
                            </p>
                            <h1 style="margin:0 0 24px;font-size:26px;font-weight:700;color:#1a1a1a;letter-spacing:-0.02em">
                                New contact enquiry
                            </h1>

                            {{-- Sender details --}}
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background:#f8faff;border:1px solid #dbeafe;border-radius:8px;margin-bottom:28px">
                                <tr>
                                    <td style="padding:20px 24px">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                            Name
                                        </p>
                                        <p style="margin:0 0 16px;font-size:17px;font-weight:600;color:#1a1a1a">
                                            {{ $senderName }}
                                        </p>

                                        <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                            Email
                                        </p>
                                        <p style="margin:0 0 16px;font-size:15px;color:#1a1a1a">
                                            <a href="mailto:{{ $senderEmail }}" style="color:#1d4ed8;text-decoration:none">{{ $senderEmail }}</a>
                                        </p>

                                        <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                            Topic
                                        </p>
                                        <p style="margin:0;font-size:15px;color:#1a1a1a">
                                            {{ ucfirst($topic) }}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            <p style="margin:0 0 10px;font-size:13px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                Message
                            </p>
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background:#f9fafb;border:1px solid #e5e7eb;border-radius:8px;margin-bottom:28px">
                                <tr>
                                    <td style="padding:20px 24px">
                                        <p style="margin:0;font-size:15px;color:#374151;line-height:1.7;white-space:pre-wrap">{{ $body }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Reply CTA --}}
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background:#1d4ed8;border-radius:8px">
                                        <a href="mailto:{{ $senderEmail }}"
                                           style="display:inline-block;padding:12px 24px;font-size:14px;font-weight:600;color:#ffffff;text-decoration:none;letter-spacing:-0.01em">
                                            Reply to {{ $senderName }} →
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:24px 40px;border-top:1px solid #e5e5e5">
                            <p style="margin:0;font-size:13px;color:#9ca3af;line-height:1.5">
                                Innovate Hub &mdash; internal notification. This message was submitted via the contact form at innovatehub.org.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>

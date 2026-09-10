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
                            <h1 style="margin:0 0 8px;font-size:28px;font-weight:700;color:#1a1a1a;letter-spacing:-0.02em">
                                Congratulations, {{ $application->first_name }}!
                            </h1>
                            <p style="margin:0 0 28px;font-size:16px;color:#555;line-height:1.6">
                                We're thrilled to let you know that your application to Innovate Hub has been
                                <strong style="color:#1a1a1a">accepted</strong>.
                            </p>

                            {{-- Accepted programme --}}
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background:#f8faff;border:1px solid #dbeafe;border-radius:8px;margin-bottom:28px">
                                <tr>
                                    <td style="padding:20px 24px">
                                        @if($application->cohort)
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                                Cohort
                                            </p>
                                            <p style="margin:0 0 16px;font-size:17px;font-weight:600;color:#1a1a1a">
                                                {{ $application->cohort->name }}
                                            </p>
                                        @endif

                                        @if($application->program)
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                                Programme
                                            </p>
                                            <p style="margin:0 0 16px;font-size:17px;font-weight:600;color:#1a1a1a">
                                                {{ $application->program->title }}
                                            </p>
                                        @endif

                                        @if($application->cohort?->start_date)
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:0.06em">
                                                Start date
                                            </p>
                                            <p style="margin:0;font-size:15px;color:#1a1a1a">
                                                {{ $application->cohort->start_date->format('F j, Y') }}
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            {{-- Acceptance deadline --}}
                            @if($application->cohort?->acceptance_deadline)
                                <table width="100%" cellpadding="0" cellspacing="0"
                                       style="background:#fffbeb;border:1px solid #fde68a;border-radius:8px;margin-bottom:28px">
                                    <tr>
                                        <td style="padding:16px 24px">
                                            <p style="margin:0;font-size:14px;color:#92400e;line-height:1.5">
                                                <strong>Action required:</strong>
                                                Please confirm your place by
                                                <strong>{{ $application->cohort->acceptance_deadline->format('F j, Y') }}</strong>.
                                                Reply to this email or visit the link below to confirm.
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            @endif

                            <p style="margin:0 0 28px;font-size:15px;color:#555;line-height:1.6">
                                To confirm your place or check your application status at any time, visit:
                            </p>

                            {{-- CTA --}}
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:36px">
                                <tr>
                                    <td style="background:#1d4ed8;border-radius:8px">
                                        <a href="{{ route('apply.status') }}"
                                           style="display:inline-block;padding:14px 28px;font-size:15px;font-weight:600;color:#ffffff;text-decoration:none;letter-spacing:-0.01em">
                                            Check application status →
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0;font-size:15px;color:#555;line-height:1.6">
                                If you have any questions, simply reply to this email and our admissions team will get back to you.
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:24px 40px;border-top:1px solid #e5e5e5">
                            <p style="margin:0;font-size:13px;color:#9ca3af;line-height:1.5">
                                Innovate Hub &mdash; a nonprofit foundation training people from every background for meaningful tech careers.<br>
                                You're receiving this because you applied at innovatehub.org.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>

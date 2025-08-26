@php
    // Embed gambar banner event (jika mau inline di email)
    $bannerCid = isset($event->banner) ? $message->embed(public_path('storage/' . $event->banner)) : null;

    // Embed gambar QR code sebagai CID (Content-ID)
    $qrCid = $message->embedData($qrBinary, $qrFilename, 'image/png');

    $fullName = trim(($attendee->first_name ?: '') . ' ' . ($attendee->last_name ?: '')) ?: 'Peserta';
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>QR Code Event - {{ $event->title }}</title>
</head>

<body style="margin: 0; padding: 0; background-color: #ffffff; font-family: Arial, sans-serif;">

    <table align="center" cellpadding="0" cellspacing="0" width="100%"
        style="max-width: 600px; background: #ffffff; border-radius: 8px; overflow: hidden;">

        @if ($bannerCid)
            <tr>
                <td>
                    <img src="{{ $bannerCid }}" alt="Banner Event"
                        style="width: 100%; display: block; max-height: 220px; object-fit: cover;">
                </td>
            </tr>
        @endif

        <tr>
            <td style="padding: 24px; color: #333333;">
                <h2 style="margin: 0 0 12px 0; font-size: 22px; text-align: center; color: #222;">{{ $event->title }}
                </h2>

                <p style="font-size: 15px; line-height: 1.6;">Halo
                    <span style="font-weight: bold; color: #3F7CFF;">{{ $fullName }}</span>,</p>

                <p style="font-size: 15px; line-height: 1.6; margin-bottom: 20px;">
                    Terima kasih telah mendaftar di event <strong>{{ $event->title }}</strong>.
                    Berikut adalah QR Code yang dapat Anda gunakan untuk akses acara ini.
                </p>

                @if (isset($qrCid))
                    <div style="text-align: center; margin: 20px 0;">
                        <img src="{{ $qrCid }}" alt="QR Code"
                            style="max-width: 200px; border: 1px solid #3F7CFF; border-radius: 6px; padding: 8px;">
                    </div>
                @endif

                <p style="font-size: 14px; line-height: 1.5; color: #555;">
                    Simpan QR Code ini dan tunjukkan saat memasuki area acara.
                </p>

                <p style="margin-top: 30px; font-size: 14px; color: #333;">
                    Salam hangat,<br>
                    <strong>Panitia {{ $event->title }}</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td align="center" style="background-color: #f9f9f9; padding: 15px; font-size: 12px; color: #777;">
                &copy; {{ date('Y') }} {{ $event->title }}. Semua hak dilindungi.
            </td>
        </tr>
    </table>

</body>

</html>

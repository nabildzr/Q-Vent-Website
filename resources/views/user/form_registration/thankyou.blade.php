<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Terima Kasih - {{ $event->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/thankyou-page.css') }}">
</head>

<body>
    <div class="thankyou-container">
        <div class="thankyou-content">
            @if ($showQr)
                <div class="qr-section">
                    <img src="{{ $qrData }}" alt="QR Code">
                </div>
            @endif

            <div class="text-section">
                <h2>Terima kasih telah mengisi form</h2>
                <p class="event-title">event "{{ $event->title }}"</p>
                <p class="event-info">
                    {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('l, d F Y H:i') }}
                </p>

                <div class="button-group">
                    @if ($showQr)
                        <a href="{{ $qrData }}" download="QR_{{ $event->id }}.png" class="btn btn-primary">Download QR Code</a>
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali ke Form</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
